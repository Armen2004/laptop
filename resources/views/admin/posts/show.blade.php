@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}
        <a href="{{ url('admin/posts/' . $post->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Post">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/posts', $post->id],
            'style' => 'display:inline'
        ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Delete Post',
                'onclick'=>'return confirm("Confirm delete?")'
        ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th> Author</th>
                <td> {{ $post->admin->name }} </td>
            </tr>
            <tr>
                <th> Title</th>
                <td> {{ $post->title }} </td>
            </tr>
            <tr>
                <th> Slug</th>
                <td> {{ $post->slug }} </td>
            </tr>
            <tr>
                <th> Description</th>
                <td> {!! $post->description !!} </td>
            </tr>
            <tr>
                <th> Image</th>
                <td><img src="{{asset($post->image)}}" alt="{{$post->title}}" width="50%"></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
