@extends('layouts.app')

@section('content')
    <link href="http://vjs.zencdn.net/5.10.4/video-js.css" rel="stylesheet">

    <!-- If you'd like to support IE8 -->
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

    <h1>Lesson {{ $lesson->title }}
        <a href="{{ url('admin/lessons/' . $lesson->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Lesson">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/lessons', $lesson->id],
            'style' => 'display:inline'
        ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Delete Lesson',
                'onclick'=>'return confirm("Confirm delete?")'
        ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th> Video Length</th>
                <td> {{ $lesson->video_length }} </td>
            </tr>
            <tr>
                <th> Description</th>
                <td> {{ $lesson->description }} </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <video id="my-video" class="video-js" controls preload="auto" width="640" height="264" poster="{{asset($lesson->course->image)}}" data-setup="{}">
            <source src="{{asset($lesson->video)}}" type='video/mp4'>
            {{--<source src="MY_VIDEO.webm" type='video/webm'>--}}
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a web browser that
                <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
        </video>
    </div>
    <script src="http://vjs.zencdn.net/5.10.4/video.js"></script>
@endsection
