<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CoursesController extends ApiBaseController
{
    public function show(Request $request)
    {
        $this->validate($request, [
            'user_type' => 'required|integer|exists:user_types,id'
        ]);

        if ($request->input('user_type') > 1)
            return response(Course::with(['lessons' => function ($query) {
                $query->with('users');
                $query->where('user_id', auth('user')->id());
            }])->get());
        else
            return response(Lesson::with(['users' => function ($query) {
                $query->where('user_id', auth('user')->id());
            }])->where('user_type_id', $request->input('user_type'))->get());
    }

    public function shows()
    {
        $l = Lesson::with(['users' => function ($query) {
            $query->where('user_id', auth('user')->id());
        }])->get();
        dd($l);//Lesson::find(1)->first()->users);
    }

    public function getLesson(Request $request)
    {
        $this->validate($request, [
            'slug' => 'required|exists:lessons,slug'
        ]);

        return response(Lesson::with('admin', 'users')->whereSlug($request->input('slug'))->first());
    }

    public function completeLesson(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|exists:lessons,id'
        ]);

        $this->user->user()->lessons()->attach($request->input('id'));
    }
}
