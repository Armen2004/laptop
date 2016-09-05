@extends('admin.layouts.app')

@section('content')
    <h1>Edit Notification {{ $notification->id }}</h1>

    {!! Form::model($notification, [
        'method' => 'PATCH',
        'url' => ['/admin/notifications', $notification->id],
        'class' => 'form-horizontal'
    ]) !!}

    @include('admin.notifications._form', ['submitButton' => 'Update'])

    {!! Form::close() !!}

@endsection