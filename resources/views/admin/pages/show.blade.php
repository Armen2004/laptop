@extends('admin.layouts.app')

@section('content')
    <h1>Page {{ $page->name }}
        <a href="{{ url('admin/pages/' . $page->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Page">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/pages', $page->id],
            'style' => 'display:inline'
        ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Delete Page',
                'onclick'=>'return confirm("Confirm delete?")'
        )) !!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $page->id }}</td>
            </tr>
            <tr>
                <th> Name</th>
                <td> {{ $page->name }} </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
