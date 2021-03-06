@extends('admin.layouts.app')

@section('content')
    <h1>Course {{ $course->name }}
        <a href="{{ url('admin/courses/' . $course->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Course">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>

        {!! App\FormHelperClass::delete_form("DELETE", 'admin/courses/' . $course->id, 'Course') !!}

    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $course->id }}</td>
            </tr>
            <tr>
                <th> Name</th>
                <td> {{ $course->name }} </td>
            </tr>
            <tr>
                <th> Slug</th>
                <td> {{ $course->slug }} </td>
            </tr>
            <tr>
                <th> Description</th>
                <td> {{ $course->description }} </td>
            </tr>
            <tr>
                <th> Status</th>
                <td><span class="label label-{{ $course->status ? "warning" : "success"}}">{{ $course->status ? "Archived" : "Not Archived"}}</span></td>
            </tr>
            <tr>
                <th> Image</th>
                <td> <img src="{{ env('S3_PATH') . $course->image }}" alt="{{ $course->name }}" width="50%"> </td>
            </tr>
            </tbody>
        </table>
    </div>
    @foreach($course->lessons->chunk(4) as $lessons)
        <div class="row">
            @foreach($lessons as $lesson)
                <div class="col-lg-4">
                    <div class="thumbnail">
                        <a href="{{url('admin/lessons/' . $course->slug . '/' . $lesson->slug)}}"> {{ $lesson->title }}&nbsp;&nbsp;
                        <span class="pull-right">{{ gmdate("i:s", $lesson->video_length) }}</span></a>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
