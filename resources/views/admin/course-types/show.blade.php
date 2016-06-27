@extends('layouts.app')

@section('content')
    <h1>CourseType {{ $coursetype->id }}
        <a href="{{ url('admin/course-types/' . $coursetype->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Course Type">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/coursetypes', $coursetype->id],
            'style' => 'display:inline'
        ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Delete Course Type',
                'onclick'=>'return confirm("Confirm delete?")'
        ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $coursetype->id }}</td>
            </tr>
            <tr>
                <th> Name</th>
                <td> {{ $coursetype->name }} </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
