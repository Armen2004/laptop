@extends('admin.layouts.app')

@section('content')
    <h1>Pages
        <a href="{{ url('admin/pages/create') }}" class="btn btn-primary btn-xs" title="Add New Page">
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
            @foreach($pages as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('admin/pages/' . $item->id) }}" class="btn btn-success btn-xs"
                           title="View Page">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                        <a href="{{ url('admin/pages/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Page">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>

                        {!! App\FormHelperClass::delete_form("DELETE", 'admin/pages/' . $item->id, 'Page') !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $pages->render() !!} </div>
    </div>
@endsection
