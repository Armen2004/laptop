@extends('layouts.app')

@section('content')
    <h1>Blog
        <a href="{{ url('/admin/blog/create') }}" class="btn btn-primary btn-xs" title="Add New Blog">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>S.No</th>
                <th> Admin Id</th>
                <th> Title</th>
                <th> Short Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($blog as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->admin->name }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->short_description }}</td>
                    <td>
                        <a href="{{ url('/admin/blog/' . $item->id) }}" class="btn btn-success btn-xs" title="View Blog">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                        <a href="{{ url('/admin/blog/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs"
                           title="Edit Blog">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/blog', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Blog" />', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete Blog',
                                'onclick'=>'return confirm("Confirm delete?")'
                        ))!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $blog->render() !!} </div>
    </div>
@endsection
