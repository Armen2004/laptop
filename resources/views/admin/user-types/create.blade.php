@extends('admin.layouts.app')

@section('content')
    <h1>Create New User Type</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/user-types', 'class' => 'form-horizontal']) !!}

    @include('admin.user-types._form', ['submitButton' => 'Create'])

    {!! Form::close() !!}
@endsection