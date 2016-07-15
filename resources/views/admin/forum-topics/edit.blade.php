@extends('admin.layouts.app')

@section('content')
    <h1>Edit Topic</h1>

    {!! Form::model($topic, [
        'method' => 'PATCH',
        'url' => ['/admin/forum-topics', $topic->id],
        'class' => 'form-horizontal'
    ]) !!}

    @include('admin.forum-topics._form', ['submitButton' => 'Update'])

    {!! Form::close() !!}
@endsection