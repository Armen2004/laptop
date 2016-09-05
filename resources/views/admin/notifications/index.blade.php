@extends('admin.layouts.app')

@section('content')
    <h1>Notifications
        <a href="{{ url('/admin/notifications/create') }}" class="btn btn-primary btn-xs" title="Add New Notification">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Title </th><th> Content </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($notifications as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->title }}</td><td>{{ $item->content }}</td>
                    <td>
                        <a href="{{ url('/admin/notifications/' . $item->id) }}" class="btn btn-success btn-xs" title="View Notification">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                        <a href="{{ url('/admin/notifications/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Notification">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>

                        {!! App\FormHelperClass::delete_form("DELETE", 'admin/notifications/' . $item->id, 'Notification') !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $notifications->render() !!} </div>
    </div>
@endsection
