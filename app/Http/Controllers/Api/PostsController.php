<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Requests;
use Illuminate\Http\Request;

class PostsController extends ApiBaseController
{
    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function all()
    {
        return response(Post::with('admin')->get());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function show(Request $request)
    {
        $this->validate($request, [
            'slug' => 'required|exists:posts,slug',
        ]);

        return response(Post::with('admin')->whereSlug($request->input('slug'))->first());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getNextPost(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|exists:posts,id',
        ]);

        return response(Post::with('admin')->where('id', '>', $request->input('id'))->first());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getPreviousPost(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|exists:posts,id',
        ]);

        return response(Post::with('admin')->where('id', '<', $request->input('id'))->first());
    }
}
