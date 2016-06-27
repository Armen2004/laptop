@extends('layouts.app')

@section('content')
    <h1>Lesson {{ $lesson->id }}
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
                <th>ID</th>
                <td>{{ $lesson->id }}</td>
            </tr>
            <tr>
                <th> Title</th>
                <td> {{ $lesson->title }} </td>
            </tr>
            <tr>
                <th> Slug</th>
                <td> {{ $lesson->slug }} </td>
            </tr>
            <tr>
                <th> Video Length</th>
                <td> {{ $lesson->video_length }} </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
