@extends('admin.layouts.app')

@section('content')
    <h1>Edit {{ $category->name }}</h1>

    {!! Form::model($category, [
        'method' => 'PATCH',
        'url' => ['/admin/forum-categories', $category->id],
        'class' => 'form-horizontal'
    ]) !!}

    @include('admin.forum-categories._form', ['submitButton' => 'Update'])

    {!! Form::close() !!}
@endsection