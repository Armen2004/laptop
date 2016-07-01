@extends('admin.layouts.app')

@section('content')
    <h1>Posts
        <a href="{{ url('/admin/posts/create') }}" class="btn btn-primary btn-xs" title="Add New Post">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>S.No</th>
                <th> Author</th>
                <th> Title</th>
                <th> Image</th>
                <th> Slug</th>
                <th> Description</th>
                <th> Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($posts as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->admin->name }}</td>
                    <td>{{ $item->title }}</td>
                    <td><img src="{{ env('S3_PATH') . $item->image }}" alt="{{ $item->title }}" width="160"></td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ str_limit($item->description) }}</td>
                    <td><span class="label label-{{ $item->status ? "warning" : "success"}}">{{ $item->status ? "Archived" : "Not Archived"}}</span></td>
                    <td>
                        <a href="{{ url('/admin/posts/' . $item->slug) }}" class="btn btn-success btn-xs" title="View Post">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                        <a href="{{ url('/admin/posts/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Post">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>

                        {!! App\FormHelperClass::delete_form("DELETE", 'admin/posts/' . $item->id, 'Post') !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $posts->render() !!} </div>
    </div>
@endsection
