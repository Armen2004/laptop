@extends('layouts.app')

@section('content')
    <h1>Edit Course {{ $course->id }}</h1>

    {!! Form::model($course, [
        'method' => 'PATCH',
        'url' => ['/admin/courses', $course->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

    @include('admin.courses._form', [ 'submitButton' => 'Update'])

    {!! Form::close() !!}
@endsection