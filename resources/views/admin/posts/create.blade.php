@extends('admin.layouts.app')

@section('content')
    <h1>Create New Post</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/posts', 'class' => 'form-horizontal', 'files' => true]) !!}

    @include('admin.posts._form', ['submitButton' => 'Create'])

    {!! Form::close() !!}
@endsection