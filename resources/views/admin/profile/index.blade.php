@extends('layouts.app')

@section('content')
    <h1>
        Profile page
        <a href="{{ url('admin/profile/' . $admin->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Page">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
    </h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $admin->id }}</td>
            </tr>
            <tr>
                <th> Name</th>
                <td> {{ $admin->name }} </td>
            </tr>
            <tr>
                <th> Email</th>
                <td> {{ $admin->email }} </td>
            </tr>
            <tr>
                <th> Picture</th>
                <td>
                    <img src="{{ $admin->image ? '/img/profile/admin-logo/' . $admin->image : '/img/user2-160x160.jpg'}}" class="user-image" alt="User Image">

                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection