@extends('layouts.app')

@section('content')
    <h1>Social {{ $social->id }}
        <a href="{{ url('admin/social/' . $social->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Social">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/social', $social->id],
            'style' => 'display:inline'
        ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Delete Social',
                'onclick'=>'return confirm("Confirm delete?")'
        ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $social->id }}</td>
            </tr>
            <tr>
                <th> Name</th>
                <td> {{ $social->name }} </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
