@extends('admin.layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rowReorder.dataTables.min.css') }}">
@endsection

@section('content')
    <h1>Forum Categories
        <a href="{{ url('/admin/forum-categories/create') }}" class="btn btn-primary btn-xs" title="Add New">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    <table class="table forum table-striped" id="data-table">
        <thead>
        <tr>
            <th class="cell-stat">Order</th>
            <th>Forum Category</th>
            <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
            <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
            <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
        </tr>
        </thead>
        <tbody>
        {{-- */$x=0;/* --}}
        @foreach($categories as $item)
            {{-- */$x++;/* --}}
            <tr data-sort="{{ $item->sort }}" data-id="{{ $item->id }}">
                <td>{{ $x }}</td>
                <td>
                    <h4>{{ $item->name }}
                    &nbsp;
                    <a href="{{ url('/admin/forum-categories/' . $item->slug) }}" class="btn btn-success btn-xs" title="View">
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
                            {{ \App\FormHelperClass::last_post($item->forumTopics)->user->name }}
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

@section('main-scripts')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.rowReorder.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            var table = $('#data-table').DataTable({
                rowReorder: true
            });

            table.on('row-reorder', function (e, diff, edit) {
                if(diff.length != 0) {
                    var tr = $('#data-table tbody').find('tr');

                    var data = [];
                    tr.each(function (index, value) {
                        $(this).attr('data-sort', ++index);
                        var object = {
                            "data-id": $(this).attr('data-id'),
                            "data-sort": $(this).attr('data-sort')
                        };

                        data.push(object)
                    });
                }

                sortMenu(data);
            });
        });

        function sortMenu(data) {
            $.ajax({
                type: 'POST',
                url: '{{route('admin.forum-categories.sort')}}',
                data: { data: data, _token: '{{csrf_token()}}' },

                error:function (xhr, ajaxOptions, thrownError){
                    $('#error').removeClass('hidden');
                    $('#error .message-body').text('ERROR!');
                },

                success: function(data, textStatus){
                    var obj = JSON.parse(data);
                    if(obj.status == 200) {
                        $('#success').removeClass('hidden');
                        $('#success .message-body').text(obj.message);
                        closeAlerts()
                    }else{
                        $('#error').removeClass('hidden');
                        $('#error .message-body').text('ERROR!');
                        closeAlerts()
                    }
                }
            });
        }

        function closeAlerts() {
            setTimeout(function () {
                $('.alert').alert('close');
            }, 5000);
        }
    </script>
@endsection
