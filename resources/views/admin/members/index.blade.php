@extends('layouts.app')

@section('content')
    <h1>Members
        <a href="{{ url('/admin/members/create') }}" class="btn btn-primary btn-xs" title="Add New Member">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    <h3>Active members</h3>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>S.No</th>
                <th> Name</th>
                <th> Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($activeMembers as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td class="text-center" style="width: 155px;">
                        <a href="{{ url('/admin/members/' . $item->id) }}" class="btn btn-success btn-xs" title="View Member">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                        <a href="{{ url('/admin/members/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Member">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>

                        {!! App\FormHelperClass::delete_form("DELETE", 'admin/members/' . $item->id) !!}
                        {!! App\FormHelperClass::block_form("DELETE", 'admin/members/' . $item->id) !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $activeMembers->render() !!} </div>
    </div>
    <h3>Blocked members</h3>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>S.No</th>
                <th> Name</th>
                <th> Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($blockedMembers as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td class="text-center" style="width: 155px;">

                        {!! App\FormHelperClass::delete_form("DELETE", 'admin/members/' . $item->id) !!}
                        {!! App\FormHelperClass::un_block_form("DELETE", 'admin/members/' . $item->id) !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $blockedMembers->render() !!} </div>
    </div>
@endsection
