@extends('layouts.app')

@section('content')
    <h1>Edit Member {{ $member->name }}</h1>

    {!! Form::model($member, [
        'method' => 'PATCH',
        'url' => ['/admin/members', $member->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

    @include('admin.members._form', ['submitButton' => 'Update'])


    {!! Form::close() !!}
@endsection