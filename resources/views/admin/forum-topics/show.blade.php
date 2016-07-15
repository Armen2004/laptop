@extends('admin.layouts.app')

@section('content')
    <h1>Channel Topic {{ $topic->title }}
        <a href="{{ url('admin/forum-topics/' . $topic->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>

        {!! \App\FormHelperClass::delete_form('DELETE', 'admin/forum-topics/' . $topic->id, "Topic") !!}

    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $topic->id }}</td>
            </tr>
            <tr>
                <th> Forum Category</th>
                <td> {{ $topic->forumCategory->name }} </td>
            </tr>
            <tr>
                <th> Title</th>
                <td> {{ $topic->title }} </td>
            </tr>
            <tr>
                <th> Slug</th>
                <td> {{ $topic->slug }} </td>
            </tr>
            <tr>
                <th> Description</th>
                <td> {{ $topic->description}} </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
