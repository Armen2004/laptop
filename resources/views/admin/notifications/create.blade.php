@extends('admin.layouts.app')

@section('content')
    <h1>Create New Notification</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/notifications', 'class' => 'form-horizontal']) !!}

    @include('admin.notifications._form', ['submitButton' => 'Create'])

    {!! Form::close() !!}
@endsection