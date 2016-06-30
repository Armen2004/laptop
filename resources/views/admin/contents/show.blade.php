@extends('admin.layouts.app')

@section('content')
    <h1>Content {{ $content->id }}
        <a href="{{ url('admin/contents/' . $content->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Content">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/contents', $content->id],
            'style' => 'display:inline'
        ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Delete Content',
                'onclick'=>'return confirm("Confirm delete?")'
        ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $content->id }}</td>
            </tr>
            <tr>
                <th> Page Id</th>
                <td> {{ $content->page_id }} </td>
            </tr>
            <tr>
                <th> Content</th>
                <td> {!! $content->content !!} </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
