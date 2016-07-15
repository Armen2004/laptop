@extends('admin.layouts.app')

@section('content')
    <h1>Edit Forum Post</h1>

    {!! Form::model($post, [
        'method' => 'PATCH',
        'url' => ['/admin/forum-posts', $post->id],
        'class' => 'form-horizontal'
    ]) !!}

    @include('admin.forum-posts._forum',['submitButton' => 'Update'])

    {!! Form::close() !!}
@endsection