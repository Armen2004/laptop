@extends('layouts.app')

@section('content')
    <h1>Edit Lesson Type {{ $lessontype->name }}</h1>

    {!! Form::model($lessontype, [
        'method' => 'PATCH',
        'url' => ['/admin/lesson-types', $lessontype->id],
        'class' => 'form-horizontal'
    ]) !!}

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <div class="col-sm-12">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection