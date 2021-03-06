<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends ApiBaseController
{
    /**
     * Get all posts with admin functionality
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function all()
    {
        return response(Post::with('admin')->get());
    }

    /**
     * Show correct post with admin functionality
     *
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
     * Show next post functionality
     *
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
     * Show previous post functionality
     *
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
