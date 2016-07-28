<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Models\ForumPost;
use App\Models\ForumTopic;
use Carbon\Carbon;
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

    /**
     * @return array
     */
    public function test()
    {
        $topics = ForumTopic::
        with([
            'forumPosts' => function ($q) {
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
            } else {
                $topic->forumPosts = [];
                $tree[] = $topic->toArray();
            }
        }
        return $tree;
    }


    /**
     * @param array $elements
     * @param int $parentId
     * @return array
     */
    public function buildTree(array $elements, $parentId = 0)
    {
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function showForum(Request $request)
    {
        $this->validate($request, [
            'slug' => 'required|exists:forum_categories,slug',
        ]);

        $forum_category = ForumCategory::orderBy('sort')->get();

        $topic = ForumCategory::with(['forumTopics' => function ($query) {
            $query->with(['forumPosts', 'user' => function ($q) {
                $q->with('userType');
            }]);
        }])->whereSlug($request->input('slug'))->first();

        return response(['forum_category' => $forum_category, 'forum_topic' => $topic]);
    }

    /**
     * Show Topic functionality
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function showTopic(Request $request)
    {
        $this->validate($request, [
            'forumSlug' => 'required|exists:forum_categories,slug',
            'topicSlug' => 'required|exists:forum_topics,slug',
        ]);

        $forum_category = ForumCategory::orderBy('sort')->get();

        $topic = ForumCategory::with([
            'forumTopics' => function ($query) use ($request) {
                $query->whereSlug($request->input('topicSlug'));
                $query->with([
                    'forumPosts' => function ($q) {
                        $q->orderBy('created_at', 'desc');
                        $q->with('user');
                    },
                    'user' => function ($q) {
                        $q->with('userType');
                    }
                ]);
            }
        ])->whereSlug($request->input('forumSlug'))->first();

        return response(['forum_category' => $forum_category, 'forum_topic' => $topic]);
    }

    /**
     * Create Post functionality
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function createPost(Request $request)
    {
        $this->validate($request, [
            'forum_topic_id' => 'required|exists:forum_topics,id',
            'slug' => 'required|exists:forum_topics,slug',
            'parent_id' => 'integer',
            'comment' => 'required',
        ]);

        $post = $this->user->user()->forumPosts()->save(new ForumPost($request->all()));
        $forum = ForumCategory::findOrFail(ForumTopic::whereSlug($request->input('slug'))->first()->forum_category_id);

        $request->merge(['forumSlug' => $forum->slug, 'topicSlug' => $request->input('slug')]);
        if ($post)
            return $this->showTopic($request);
        else
            return response(['status' => false]);
    }


    /**
     * Like topic functionality
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function like(Request $request)
    {
        $this->validate($request, [
            'topicID' => 'required|integer|exists:forum_topics,id'
        ]);

        $query = DB::table('forum_topic_user')
            ->where('user_id', $this->user->user()->id)
            ->where('forum_topic_id', $request->input('topicID'))
            ->get();

        if (count($query) > 0) {
            return response(['status' => false, 'message' => 'You always thanks for this topic.']);
        } else {

            $topic = ForumTopic::findOrFail($request->input('topicID'));
            ++$topic->likes;
            $topic->save();

            DB::table('forum_topic_user')->insert([
                'user_id' => $this->user->user()->id,
                'forum_topic_id' => $request->input('topicID'),
                'liked_at' => Carbon::now()
            ]);

            return response(['status' => true]);
//            return $this->all();
        }
    }

    /**
     * List of users who liked topic
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function likeUsers(Request $request)
    {
        $this->validate($request, [
            'topicID' => 'required|integer|exists:forum_topics,id'
        ]);

        $query = DB::table('forum_topic_user')
            ->select('users.*', 'user_types.name as user_type', 'forum_topic_user.*')
            ->join('users', 'users.id', '=', 'forum_topic_user.user_id')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
//            ->where('user_id', $this->user->user()->id)
            ->where('forum_topic_id', $request->input('topicID'))
            ->orderBy('forum_topic_user.liked_at', 'desc')
            ->get();

        return response($query);
    }
}
