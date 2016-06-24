@extends('layouts.app')

@section('content')
    <h1>Edit Blog {{ $blog->id }}</h1>

    {!! Form::model($blog, [
        'method' => 'PATCH',
        'url' => ['/admin/blog', $blog->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

    @include('admin.blog._form', ['submitButton' => 'Update'])

    {!! Form::close() !!}
@endsection