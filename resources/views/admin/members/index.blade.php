@extends('layouts.app')

@section('content')
    <h1>Members
        <a href="{{ url('/admin/members/create') }}" class="btn btn-primary btn-xs" title="Add New Member">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h1>
    @unless($activeMembers->count() == 0)
        <h3>Active members</h3>
        <div class="table">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th> Name</th>
                    <th> Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                {{-- */$x=0;/* --}}
                @foreach($activeMembers as $item)
                    {{-- */$x++;/* --}}
                    <tr>
                        <td>{{ $x }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td class="text-center" style="width: 155px;">
                            <a href="{{ url('/admin/members/' . $item->id) }}" class="btn btn-success btn-xs" title="View Member">
                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                            </a>
                            <a href="{{ url('/admin/members/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Member">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/admin/members', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Member" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Member',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                            {!! Form::close() !!}

                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/admin/members', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::text('block', 1, ['class' => 'hidden']) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-ban-circle" aria-hidden="true" title="Block Member" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-warning btn-xs',
                                    'title' => 'Block Member',
                                    'onclick'=>'return confirm("Confirm block?")'
                            ))!!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $activeMembers->render() !!} </div>
        </div>
    @endunless
    @unless($blockedMembers->count() == 0)
        <h3>Blocked members</h3>
        <div class="table">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th> Name</th>
                    <th> Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                {{-- */$x=0;/* --}}
                @foreach($blockedMembers as $item)
                    {{-- */$x++;/* --}}
                    <tr>
                        <td>{{ $x }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td class="text-center" style="width: 155px;">
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/admin/members', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Member" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Member',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                            {!! Form::close() !!}

                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/admin/members', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::text('restore', 1, ['class' => 'hidden']) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-ok-circle" aria-hidden="true" title="Restore Member" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-info btn-xs',
                                    'title' => 'Restore Member',
                                    'onclick'=>'return confirm("Confirm restore?")'
                            ))!!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $blockedMembers->render() !!} </div>
        </div>
    @endunless
@endsection
