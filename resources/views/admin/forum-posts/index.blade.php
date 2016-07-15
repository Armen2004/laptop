@extends('admin.layouts.app')

@section('content')
    <h1>Forum posts
        <a href="{{ url('/admin/forum-posts/create') }}" class="btn btn-primary btn-xs" title="Add New">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>S.No</th>
                <th> Topic</th>
                <th> Author</th>
                <th> Comment</th>
                <th> Likes</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($posts as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->forumTopic->title }}</td>
                    <td>{{ $item->admin->name or $item->user->name }}</td>
                    <td>{{ $item->comment }}</td>
                    <td>{{ $item->like }}</td>
                    <td>
                        <a href="{{ url('/admin/forum-posts/' . $item->id) }}" class="btn btn-success btn-xs" title="View">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                        <a href="{{ url('/admin/forum-posts/' . $item->id . '/edit') }}"
                           class="btn btn-primary btn-xs" title="Edit">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>

                        {!! \App\FormHelperClass::delete_form('DELETE', 'admin/forum-posts/' . $item->id, "Post") !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $posts->render() !!} </div>
    </div>
@endsection
