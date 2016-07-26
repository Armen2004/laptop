<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Models\ForumPost;
use App\Models\ForumTopic;
use Illuminate\Http\Request;
use App\Models\ForumCategory;
use Illuminate\Support\Facades\DB;

class ForumController extends ApiBaseController
{
    /**
     * Get all forums with topics, posts.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function all()
    {

        return response(ForumCategory::with(['forumTopics' => function ($query) {
            $query->with(['forumPosts', 'user' => function ($q) {
                $q->with('userType');
            }]);
        }])->orderBy('sort')->get());
    }

    public function test()
    {
        $topics = ForumTopic::
        with(['forumPosts' => function ($q) {
            $q->with('user');
            $q->orderBy('parent_id');
            $q->orderBy('created_at', 'desc');
        }
        , 'user' => function ($q) {
            $q->with('userType');
        }
        ])->get();

        $tree = [];

        foreach ($topics as $topic) {
            if ($topic->forumPosts->count() > 0) {
                $topic->forumPosts = $this->buildTree($topic->forumPosts->toArray());
                $tree[] = $topic;
            }else{
                $topic->forumPosts = [];
                $tree[] = $topic->toArray();
            }
        }
        return $tree;
    }


    public function buildTree(array $elements, $parentId = 0) {
        $branch = array();

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            'slug' => 'required|exists:forum_topics,slug',
        ]);

        $forum_category = ForumCategory::orderBy('sort')->get();

        $topic = ForumTopic::
        with(['forumPosts' => function ($q) {
            $q->with('user');
            $q->orderBy('parent_id');
            $q->orderBy('created_at', 'desc');
        }, 'user' => function ($q) {
            $q->with('userType');
        }])->whereSlug($request->input('slug'))->first();

        $tree = [];
        $parent = 0;
        $start = 0;

        foreach ($topic->forumPosts->toArray() as $key => $value) {
            if ($value['parent_id'] == $parent) {
                $tree[$start] = $value;
                $start++;
            } else {
                foreach ($tree as $k => $v) {
                    if ($v['id'] == $value['parent_id']) {
                        $tree[$k]['childrens'][] = $value;
                    }
                }
            }
        }

        $topic->forumPosts = $tree;

        return response(['forum_category' => $forum_category, 'forum_topic' => $topic]);
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'forum_topic_id' => 'required|exists:forum_topics,id',
            'slug' => 'required|exists:forum_topics,slug',
            'parent_id' => 'integer',
            'comment' => 'required',
        ]);

        $post = $this->user->user()->forumPosts()->save(new ForumPost($request->all()));;

        if ($post)
            return $this->show($request);
        else
            return response(['status' => 'ERROR!!!]']);
    }


    /**
     * like topic functionality
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function like(Request $request)
    {
        $this->validate($request, [
            'topicID' => 'required|integer|exists:forum_topics,id'
        ]);

        $query = DB::table('forum_topic_user')->where('user_id', $this->user->user()->id)->where('forum_topic_id', $request->input('topicID'))->get();

        if (count($query) > 0) {
            return $this->all();
        } else {

            $topic = ForumTopic::findOrFail($request->input('topicID'));
            ++$topic->likes;
            $topic->save();

            DB::table('forum_topic_user')->insert([
                'user_id' => $this->user->user()->id,
                'forum_topic_id' => $request->input('topicID')
            ]);

            return $this->all();
        }
    }

    public function likeUsers(Request $request)
    {
        $this->validate($request, [
            'topicID' => 'required|integer|exists:forum_topics,id'
        ]);

        $query = DB::table('forum_topic_user')
            ->join('users', 'users.id', '=', 'forum_topic_user.user_id')
            ->where('user_id', $this->user->user()->id)
            ->where('forum_topic_id', $request->input('topicID'))->get();

        return response($query);
    }
}
