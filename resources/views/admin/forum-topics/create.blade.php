@extends('admin.layouts.app')

@section('content')
    <h1>Create New Topic</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/forum-topics', 'class' => 'form-horizontal']) !!}

    @include('admin.forum-topics._form', ['submitButton' => 'Create'])

    {!! Form::close() !!}
@endsection