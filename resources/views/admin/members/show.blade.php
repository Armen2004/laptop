@extends('layouts.app')

@section('content')
    <h1>Member {{ $member->id }}
        <a href="{{ url('admin/members/' . $member->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Member">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/members', $member->id],
            'style' => 'display:inline'
        ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Delete Member',
                'onclick'=>'return confirm("Confirm delete?")'
        ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $member->id }}</td>
            </tr>
            <tr>
                <th> Name</th>
                <td> {{ $member->name }} </td>
            </tr>
            <tr>
                <th> Email</th>
                <td> {{ $member->email }} </td>
            </tr>
            <tr>
                <th> Picture</th>
                <td>
                    <img src="{{ $member->image ? asset($member->image) : '/img/user2-160x160.jpg'}}" class="user-image" alt="{{ $member->name }}">
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
