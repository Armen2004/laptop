@extends('admin.layouts.app')

@section('content')

    @include('admin.dashboard.section_one', [
        'user_count' => $user_count,
        'user_type_count' => $user_type_count,
        'post_count' => $post_count,
        'course_count' => $course_count,
        'lesson_count' => $lesson_count,
        'forum_category_count' => $forum_category_count,
    ])

    @include('admin.dashboard.section_two', [
        'last_8_users' => $last_8_users
     ])

    @include('admin.dashboard.section_three', [
        'last_4_courses' => $last_4_courses,
        'last_4_lessons' => $last_4_lessons,
        'last_4_topics' => $last_4_topics,
        'last_4_posts' => $last_4_posts
     ])

@endsection