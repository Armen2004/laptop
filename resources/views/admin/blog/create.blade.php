@extends('layouts.app')

@section('content')
    <h1>Create New Blog</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/blog', 'class' => 'form-horizontal', 'files' => true]) !!}

    @include('admin.blog._form', ['submitButton' => 'Create'])

    {!! Form::close() !!}
@endsection