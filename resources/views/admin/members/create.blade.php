@extends('layouts.app')

@section('content')
    <h1>Create New Member</h1>
    <hr/>
    {!! Form::open(['url' => '/admin/members', 'class' => 'form-horizontal']) !!}

    @include('admin.members._form', ['submitButton' => 'Create'])

    {!! Form::close() !!}
@endsection