@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}
        <a href="{{ url('admin/posts/' . $post->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Post">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        {!! App\FormHelperClass::delete_form("DELETE", 'admin/posts/' . $post->id, 'Post') !!}
        {!! App\FormHelperClass::block_form("DELETE", 'admin/posts/' . $post->id, 'Post') !!}
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
                <th> Status</th>
                <td> <span class="label label-{{ $post->status ? "success" : "warning"}}">{{ $post->status ? "Published" : "Not Published"}}</span> </td>
            </tr>
            <tr>
                <th> Description</th>
                <td> {!! $post->description !!} </td>
            </tr>
            <tr>
                <th> Image</th>
                <td><img src="{{ env('S3_PATH') . $post->image }}" alt="{{ $post->title }}" width="50%"></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
