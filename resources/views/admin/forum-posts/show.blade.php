@extends('admin.layouts.app')

@section('content')
    <h1>Forum Post Comment
        <a href="{{ url('admin/forum-posts/' . $post->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>

        {!! \App\FormHelperClass::delete_form('DELETE', 'admin/forum-posts/' . $post->id, "Post") !!}

    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $post->id }}</td>
            </tr>
            <tr>
                <th> Post </th>
                <td> {{ $post->forumTopic->title }} </td>
            </tr>
            <tr>
                <th> Author </th>
                <td> {{ $post->user->name }} </td>
            </tr>
            <tr>
                <th> Comment</th>
                <td> {{ $post->comment }} </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
