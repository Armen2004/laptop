@extends('layouts.app')

@section('content')
    <h1>Create New CourseType</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/course-types', 'class' => 'form-horizontal']) !!}

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <div class="col-sm-12">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection