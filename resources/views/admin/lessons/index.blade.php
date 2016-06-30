@extends('admin.layouts.app')

@section('content')
    <h1>Lessons
        <a href="{{ url('/admin/lessons/create') }}" class="btn btn-primary btn-xs" title="Add New Lesson">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>S.No</th>
                <th> Title</th>
                <th> Slug</th>
                <th> Video Length</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($lessons as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->video_length }}</td>
                    <td>
                        <a href="{{ url('/admin/lessons/' . $item->course->slug . '/' . $item->slug) }}" class="btn btn-success btn-xs" title="View Lesson">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                        <a href="{{ url('/admin/lessons/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Lesson">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/lessons', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Lesson" />', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete Lesson',
                                'onclick'=>'return confirm("Confirm delete?")'
                        ))!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $lessons->render() !!} </div>
    </div>
@endsection
