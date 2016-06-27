@extends('layouts.app')

@section('content')
    <h1>Edit Lesson {{ $lesson->id }}</h1>

    {!! Form::model($lesson, [
        'method' => 'PATCH',
        'url' => ['/admin/lessons', $lesson->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

    @include('admin.lessons._form', ['submitButton' => 'Update'])

    {!! Form::close() !!}
@endsection