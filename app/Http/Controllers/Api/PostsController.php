<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function all()
    {
        return response(Post::with('admin')->get());
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            'slug' => 'required|exists:posts,slug',
        ]);
        
        return response(Post::with('admin')->whereSlug($request->input('slug'))->first());
    }
}
