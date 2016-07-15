@extends('admin.layouts.app')

@section('content')
    <h1>Create New Post</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/forum-posts', 'class' => 'form-horizontal']) !!}

    @include('admin.forum-posts._forum',['submitButton' => 'Create'])

    {!! Form::close() !!}
@endsection