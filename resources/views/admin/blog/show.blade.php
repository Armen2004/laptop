@extends('layouts.app')

@section('content')
    <h1>Blog {{ $blog->id }}
        <a href="{{ url('admin/blog/' . $blog->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Blog">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/blog', $blog->id],
            'style' => 'display:inline'
        ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Delete Blog',
                'onclick'=>'return confirm("Confirm delete?")'
        ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $blog->id }}</td>
            </tr>
            <tr>
                <th> Admin Id</th>
                <td> {{ $blog->admin->name }} </td>
            </tr>
            <tr>
                <th> Title</th>
                <td> {{ $blog->title }} </td>
            </tr>
            <tr>
                <th> Short Description</th>
                <td> {{ $blog->short_description }} </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
