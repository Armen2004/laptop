@extends('admin.layouts.app')

@section('content')
    <h1>Lesson {{ $lesson->title }}
        <a href="{{ url('admin/lessons/' . $lesson->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Lesson">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>

        {!! App\FormHelperClass::delete_form("DELETE", 'admin/lessons/' . $lesson->id, 'Lesson') !!}

    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th> Video Length</th>
                <td> {{ gmdate("i:s", $lesson->video_length) }} </td>
            </tr>
            <tr>
                <th> Status</th>
                <td><span class="label label-{{ $lesson->status ? "warning" : "success"}}">{{ $lesson->status ? "Archived" : "Not Archived"}}</span></td>
            </tr>
            <tr>
                <th> Description</th>
                <td> {{ $lesson->description }} </td>
            </tr>
            </tbody>
        </table>
    </div>
    <video src="{{ env('S3_PATH') . $lesson->video}}" controls="controls"></video>
@endsection
