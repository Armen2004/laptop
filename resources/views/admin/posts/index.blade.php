@extends('admin.layouts.app')

@section('content')
    <h1>Posts
        <a href="{{ url('/admin/posts/create') }}" class="btn btn-primary btn-xs" title="Add New Post">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    <h3>Active posts</h3>
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
            @foreach($activePosts as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->admin->name }}</td>
                    <td>{{ $item->title }}</td>
                    <td><img src="{{ env('S3_PATH') . $item->image }}" alt="{{ $item->title }}" width="160"></td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ str_limit($item->description) }}</td>
                    <td class="text-center"><span class="label label-{{ $item->status ? "success" : "warning"}}">{{ $item->status ? "Published" : "Not Published"}}</span></td>
                    <td>
                        <a href="{{ url('/admin/posts/' . $item->slug) }}" class="btn btn-success btn-xs" title="View Post">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                        <a href="{{ url('/admin/posts/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Post">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>

                        {!! App\FormHelperClass::delete_form("DELETE", 'admin/posts/' . $item->id, 'Post') !!}
                        {!! App\FormHelperClass::block_form("DELETE", 'admin/posts/' . $item->id, 'Post') !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $activePosts->render() !!} </div>
    </div>
    <h3>Blocked posts</h3>
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
            @foreach($blockedPosts as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->admin->name }}</td>
                    <td>{{ $item->title }}</td>
                    <td><img src="{{ env('S3_PATH') . $item->image }}" alt="{{ $item->title }}" width="160"></td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ str_limit($item->description) }}</td>
                    <td class="text-center"><span class="label label-{{ $item->status ? "success" : "warning"}}">{{ $item->status ? "Published" : "Not Published"}}</span></td>
                    <td>

                        {!! App\FormHelperClass::delete_form("DELETE", 'admin/posts/' . $item->id, 'Post') !!}
                        {!! App\FormHelperClass::un_block_form("DELETE", 'admin/posts/' . $item->id, 'Post') !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $blockedPosts->render() !!} </div>
    </div>
@endsection
