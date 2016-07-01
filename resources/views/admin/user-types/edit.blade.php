@extends('admin.layouts.app')

@section('content')
    <h1>Edit User Type {{ $usertype->name }}</h1>

    {!! Form::model($usertype, [
        'method' => 'PATCH',
        'url' => ['/admin/user-types', $usertype->id],
        'class' => 'form-horizontal'
    ]) !!}

    @include('admin.user-types._form', ['submitButton' => 'Update'])

    {!! Form::close() !!}
@endsection