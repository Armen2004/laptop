@extends('layouts.app')

@section('content')
    <h1>Course types
        <a href="{{ url('/admin/course-types/create') }}" class="btn btn-primary btn-xs" title="Add New Course Type">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>S.No</th>
                <th> Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($coursetypes as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('/admin/course-types/' . $item->id) }}" class="btn btn-success btn-xs" title="View Course Type">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                        <a href="{{ url('/admin/course-types/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Course Type">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/course-types', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Course Type" />', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete Course Type',
                                'onclick'=>'return confirm("Confirm delete?")'
                        ))!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $coursetypes->render() !!} </div>
    </div>
@endsection
