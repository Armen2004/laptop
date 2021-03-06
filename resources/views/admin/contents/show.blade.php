@extends('admin.layouts.app')

@section('content')
    <h1>Content {{ $content->id }}
        <a href="{{ url('admin/contents/' . $content->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Content">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        {!! App\FormHelperClass::delete_form("DELETE", 'admin/contents/' . $content->id, 'Content') !!}
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
