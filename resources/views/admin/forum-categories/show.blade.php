@extends('admin.layouts.app')

@section('content')
    <h1>{{ $category->name }}
        <a href="{{ url('admin/forum-categories/' . $category->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/forum-categories', $category->id],
            'style' => 'display:inline'
        ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Delete',
                'onclick'=>'return confirm("Confirm delete?")'
        ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <th> Name</th>
                <td> {{ $category->name }} </td>
            </tr>
            <tr>
                <th> Slug</th>
                <td> {{ $category->slug }} </td>
            </tr>
            <tr>
                <th> Description</th>
                <td> {{ $category->description }} </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
