@extends('layouts.app')

@section('content')
    <h1>Courses
        <a href="{{ url('/admin/courses/create') }}" class="btn btn-primary btn-xs" title="Add New Course">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    <h3>Active courses</h3>
    <div class="table">
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>S.No</th>
            <th> Name</th>
            <th> Slug</th>
            <th> Description</th>
            <th> Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        {{-- */$x=0;/* --}}
        @foreach($activeCourses as $item)
            {{-- */$x++;/* --}}
            <tr>
                <td>{{ $x }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->slug }}</td>
                <td>{{ $item->description }}</td>
                <td class="text-center"><span class="label label-{{ $item->status ? "success" : "warning"}}">{{ $item->status ? "Published" : "Not Published"}}</span></td>
                <td>
                    <a href="{{ url('/admin/courses/' . $item->slug) }}" class="btn btn-success btn-xs" title="View Course">
                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                    </a>
                    <a href="{{ url('/admin/courses/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Course">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['/admin/courses', $item->id],
                        'style' => 'display:inline'
                    ]) !!}
                    {!! Form::text('block', 1, ['class' => 'hidden']) !!}
                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Course" />', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Course',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper"> {!! $activeCourses->render() !!} </div>
</div>
    <h3>Blocked courses</h3>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>S.No</th>
                <th> Name</th>
                <th> Slug</th>
                <th> Description</th>
                <th> Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($blockedCourses as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->description }}</td>
                    <td class="text-center"><span class="label label-{{ $item->status ? "success" : "warning"}}">{{ $item->status ? "Published" : "Not Published"}}</span></td>
                    <td class="text-center" style="width: 155px;">
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/courses', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Courses" />', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete Courses',
                                'onclick'=>'return confirm("Confirm delete?")'
                        ))!!}
                        {!! Form::close() !!}

                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/courses', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::text('restore', 1, ['class' => 'hidden']) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-ok-circle" aria-hidden="true" title="Restore Courses" />', array(
                                'type' => 'submit',
                                'class' => 'btn btn-info btn-xs',
                                'title' => 'Restore Courses',
                                'onclick'=>'return confirm("Confirm restore?")'
                        ))!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $blockedCourses->render() !!} </div>
    </div>
@endsection
