@extends('admin.layouts.app')

@section('content')
    <h1>Notification {{ $notification->id }}
        <a href="{{ url('admin/notifications/' . $notification->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Notification">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>

        {!! App\FormHelperClass::delete_form("DELETE", 'admin/notifications/' . $notification->id, 'Notification') !!}

    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $notification->id }}</td>
            </tr>
            <tr>
                <th> Title</th>
                <td> {{ $notification->title }} </td>
            </tr>
            <tr>
                <th> Content</th>
                <td> {{ $notification->content }} </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
