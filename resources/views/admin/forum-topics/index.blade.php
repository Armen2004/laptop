@extends('admin.layouts.app')

@section('content')
    <h1>Forum topics
        <a href="{{ url('/admin/forum-topics/create') }}" class="btn btn-primary btn-xs" title="Add New">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>S.No</th>
                <th> Forum Category</th>
                <th> Author</th>
                <th> Title</th>
                <th> Slug</th>
                <th> Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($topics as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->forumCategory->name }}</td>
                    <td>{{ $item->admin->name or $item->user->name }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <a href="{{ url('/admin/forum-topics/' . $item->id) }}" class="btn btn-success btn-xs" title="View">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                        <a href="{{ url('/admin/forum-topics/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>

                        {!! \App\FormHelperClass::delete_form('DELETE', 'admin/forum-topics/' . $item->id, "Topic") !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $topics->render() !!} </div>
    </div>
@endsection
