@extends('admin.layouts.app')

@section('content')
    <h1>Courses
        <a href="{{ url('/admin/courses/create') }}" class="btn btn-primary btn-xs" title="Add New Course">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    <div class="table">
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>S.No</th>
            <th> Author</th>
            <th> Name</th>
            <th> Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        {{-- */$x=0;/* --}}
        @foreach($courses as $item)
            {{-- */$x++;/* --}}
            <tr>
                <td>{{ $x }}</td>
                <td>{{ $item->admin->name }}</td>
                <td>{{ $item->name }}</td>
                <td class="text-center"><span class="label label-{{ $item->status ? "warning" : "success"}}">{{ $item->status ? "Archived" : "Not Archived"}}</span></td>
                <td>
                    <a href="{{ url('/admin/courses/' . $item->slug) }}" class="btn btn-success btn-xs" title="View Course">
                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                    </a>
                    <a href="{{ url('/admin/courses/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Course">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    {!! App\FormHelperClass::delete_form("DELETE", 'admin/courses/' . $item->id, 'Course') !!}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper"> {!! $courses->render() !!} </div>
</div>
@endsection
