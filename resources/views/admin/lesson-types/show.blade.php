@extends('admin.layouts.app')

@section('content')
    <h1>Lesson Type {{ $lessontype->id }}
        <a href="{{ url('admin/lesson-types/' . $lessontype->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Lesson Type">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/lesson-types', $lessontype->id],
            'style' => 'display:inline'
        ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Delete Lesson Type',
                'onclick'=>'return confirm("Confirm delete?")'
        ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $lessontype->id }}</td>
            </tr>
            <tr>
                <th> Name</th>
                <td> {{ $lessontype->name }} </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
