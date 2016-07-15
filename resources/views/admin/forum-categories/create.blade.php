@extends('admin.layouts.app')

@section('content')
    <h1>Create New Category</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/forum-categories', 'class' => 'form-horizontal']) !!}

    @include('admin.forum-categories._form', ['submitButton' => 'Create'])

    {!! Form::close() !!}
@endsection