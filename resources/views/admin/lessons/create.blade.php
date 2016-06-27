@extends('layouts.app')

@section('content')
    <h1>Create New Lesson</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/lessons', 'class' => 'form-horizontal', 'files' => true]) !!}

    @include('admin.lessons._form', ['submitButton' => 'Create'])

    {!! Form::close() !!}
@endsection