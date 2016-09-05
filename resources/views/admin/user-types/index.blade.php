@extends('admin.layouts.app')

@section('content')
    <h1>User Types
        <a href="{{ url('/admin/user-types/create') }}" class="btn btn-primary btn-xs" title="Add New User Type">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>S.No</th>
                <th> Name</th>
                <th> Price</th>
                <th> Duration</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($usertype as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}$</td>
                    <td>{{ $item->duration }} day</td>
                    <td>
                        <a href="{{ url('/admin/user-types/' . $item->id) }}" class="btn btn-success btn-xs" title="View User Type">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                        <a href="{{ url('/admin/user-types/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit User Type">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>

                        {!! App\FormHelperClass::delete_form("DELETE", 'admin/user-types/' . $item->id, 'User Type') !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $usertype->render() !!} </div>
    </div>
@endsection
