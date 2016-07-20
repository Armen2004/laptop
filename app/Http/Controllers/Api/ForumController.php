<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Models\ForumCategory;

class ForumController extends ApiBaseController
{
    public function all()
    {
        return response(ForumCategory::with(['forumTopics' => function($query){
            $query->with('forumPosts');
        }])->orderBy('sort')->get());
    }
}
