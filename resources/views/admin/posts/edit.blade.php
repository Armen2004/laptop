@extends('admin.layouts.app')

@section('content')
    <h1>Edit Post {{ $post->title }}</h1>

    {!! Form::model($post, [
        'method' => 'PATCH',
        'url' => ['/admin/posts', $post->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

    @include('admin.posts._form', ['submitButton' => 'Update'])

    {!! Form::close() !!}
@endsection