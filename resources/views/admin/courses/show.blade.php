@extends('layouts.app')

@section('content')
    <h1>Course {{ $course->id }}
        <a href="{{ url('admin/courses/' . $course->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Course">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/courses', $course->id],
            'style' => 'display:inline'
        ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Delete Course',
                'onclick'=>'return confirm("Confirm delete?")'
        ))!!}
        {!! Form::close() !!}
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
            </tbody>
        </table>
    </div>
@endsection
