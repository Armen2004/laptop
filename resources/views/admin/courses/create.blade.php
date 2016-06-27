@extends('layouts.app')

@section('content')
    <h1>Create New Course</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/courses', 'class' => 'form-horizontal', 'files' => true]) !!}

    @include('admin.courses._form', [ 'submitButton' => 'Create'])

    {!! Form::close() !!}
@endsection