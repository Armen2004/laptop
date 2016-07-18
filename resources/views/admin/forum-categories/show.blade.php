@extends('admin.layouts.app')

@section('content')
    <h1>{{ $category->name }}
        <a href="{{ url('admin/forum-categories/' . $category->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>

        {!! \App\FormHelperClass::delete_form('DELETE', 'admin/forum-categories/' . $category->id, "Category") !!}

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

    @if($category->forumTopics->count() > 0)
        <h3>Forum Topics</h3>

        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @foreach($category->forumTopics as $forumTopic)
                <tr>
                    <td><a href="{{ url('admin/forum-topics', $forumTopic->slug) }}">{{ $forumTopic->title }}</a></td>
                    <td>{{ $forumTopic->description }}</td>
                    <td>{!! \App\FormHelperClass::delete_form('DELETE', 'admin/forum-topics/' . $forumTopic->id, "Topic") !!}</td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
