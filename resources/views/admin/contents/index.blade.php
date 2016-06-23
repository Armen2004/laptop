@extends('layouts.app')

@section('content')
    <h1>Contents
        <a href="{{ url('admin/contents/create') }}" class="btn btn-primary btn-xs" title="Add New Content">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>S.No</th>
                <th>Page</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($contents as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->page->name }}</td>
                    <td>
                        <a href="{{ url('admin/contents/' . $item->id) }}" class="btn btn-success btn-xs" title="View Content">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                        <a href="{{ url('admin/contents/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Content">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/contents', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Content" />', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete Content',
                                'onclick'=>'return confirm("Confirm delete?")'
                        ))!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $contents->render() !!} </div>
    </div>
@endsection
