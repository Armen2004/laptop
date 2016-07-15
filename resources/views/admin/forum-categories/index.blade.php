@extends('admin.layouts.app')

@section('content')
    <h1>Forum Categories
        <a href="{{ url('/admin/forum-categories/create') }}" class="btn btn-primary btn-xs" title="Add New">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    <table class="table forum table-striped">
        <thead>
        <tr>
            <th class="cell-stat"></th>
            <th>Forum Category</th>
            <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
            <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
            <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $item)
            <tr>
                <td class="text-center"><i class="fa fa-question fa-2x text-primary"></i></td>
                <td>
                    <h4>{{ $item->name }}
                    &nbsp;
                    <a href="{{ url('/admin/forum-categories/' . $item->id) }}" class="btn btn-success btn-xs" title="View">
                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                    </a>
                    <a href="{{ url('/admin/forum-categories/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    {!! \App\FormHelperClass::delete_form('DELETE', 'admin/forum-categories/' . $item->id, "Category") !!}

                    <br><small>{{ $item->description }}</small></h4>
                </td>
                <td class="text-center hidden-xs hidden-sm">
                    @if($item->forumTopics->count() > 0)
                        {{ $item->forumTopics->count() }}
                    @else
                        0
                    @endif
                    &nbsp;
                    <a href="{{ url('/admin/forum-topics/create') }}" class="btn btn-primary btn-xs" title="Add New">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                </td>
                <td class="text-center hidden-xs hidden-sm">
                    {{ \App\FormHelperClass::post_count($item->forumTopics) }}
                    &nbsp;
                    @if($item->forumTopics->count() > 0)
                        <a href="{{ url('/admin/forum-posts/create') }}" class="btn btn-primary btn-xs" title="Add New">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </a>
                    @endif
                </td>
                <td class="hidden-xs hidden-sm">
                    @if(is_object(\App\FormHelperClass::last_post($item->forumTopics)))
                        by <a href="{{ url('admin/members/' . \App\FormHelperClass::last_post($item->forumTopics)->user->id) }}">
                            {{ \App\FormHelperClass::last_post($item->forumTopics)->admin->name }}
                        </a><br>
                        <small><i class="fa fa-clock-o"></i>
                            {{ \App\FormHelperClass::last_post($item->forumTopics)->created_at->diffForHumans(\Carbon\Carbon::now()) }}
                        </small>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
