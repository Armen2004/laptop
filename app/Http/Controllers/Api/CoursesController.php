<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class CoursesController extends ApiBaseController
{
    /**
     * Get course and lesson by user type functionality
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function show(Request $request)
    {
        $this->validate($request, [
            'user_type' => 'required|integer|exists:user_types,id'
        ]);

        if ($request->input('user_type') > 1)
            return response(Course::with(['admin', 'lessons' => function ($query) {
                $query->with(['admin', 'users' => function ($q) {
                    $q->where('user_id', $this->user->id());
                }]);
            }])->has('lessons', '>', 0)->get());
        else
            return response(Lesson::with(['users' => function ($query) {
                $query->where('user_id', $this->user->id());
            }])->where('user_type_id', $request->input('user_type'))->get());
    }

    /**
     * Get lesson by slug functionality.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getLesson(Request $request)
    {
        $this->validate($request, [
            'slug' => 'required|exists:lessons,slug'
        ]);

        return response(Lesson::with('admin', 'users')->whereSlug($request->input('slug'))->first());
    }

    /**
     * Complete Lesson functionality
     *
     * @param Request $request
     */
    public function completeLesson(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|exists:lessons,id'
        ]);

        $this->user->user()->lessons()->attach($request->input('id'));
    }

    /**
     * Get next lesson functionality
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getNextLesson(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|exists:lessons,id',
        ]);

        return response(Lesson::with('admin')->where('id', '>', $request->input('id'))->where('user_type_id', $this->user->user()->user_type_id)->first());
    }

    /**
     * Get previous lesson functionality
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getPreviousLesson(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|exists:lessons,id',
        ]);

        return response(Lesson::with('admin')->where('id', '<', $request->input('id'))->where('user_type_id', $this->user->user()->user_type_id)->first());
    }
}
