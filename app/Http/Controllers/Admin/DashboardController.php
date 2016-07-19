<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Post;
use App\Http\Requests;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\UserType;
use App\Models\ForumPost;
use App\Models\ForumTopic;
use App\Models\ForumCategory;

class DashboardController extends AdminBaseController
{
    public function index()
    {
        $user_count = User::all()->count();
        $user_type_count = UserType::all()->count();
        $post_count = Post::all()->count();
        $course_count = Course::all()->count();
        $lesson_count = Lesson::all()->count();
        $forum_category_count = ForumCategory::all()->count();
        $last_8_users = User::orderBy('created_at', 'desc')->take(8)->skip(0)->get();
        $last_4_courses = Course::orderBy('created_at', 'desc')->take(4)->skip(0)->get();
        $last_4_lessons = Lesson::orderBy('created_at', 'desc')->take(4)->skip(0)->get();
        $last_4_topics = ForumTopic::orderBy('created_at', 'desc')->take(4)->skip(0)->get();
        $last_4_posts = ForumPost::orderBy('created_at', 'desc')->take(4)->skip(0)->get();
        return view('admin.dashboard.dashboard', compact(
            'user_count', 
            'user_type_count', 
            'post_count', 
            'course_count', 
            'lesson_count',
            'forum_category_count',
            'last_8_users',
            'last_4_courses',
            'last_4_lessons',
            'last_4_topics',
            'last_4_posts'
        ));
    }
}
