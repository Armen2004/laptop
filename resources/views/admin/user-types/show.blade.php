@extends('admin.layouts.app')

@section('content')
    <h1>User Type {{ $usertype->name }}
        <a href="{{ url('admin/user-types/' . $usertype->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit UserType">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/usertype', $usertype->id],
            'style' => 'display:inline'
        ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Delete UserType',
                'onclick'=>'return confirm("Confirm delete?")'
        ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $usertype->id }}</td>
            </tr>
            <tr>
                <th> Name</th>
                <td> {{ $usertype->name }} </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
