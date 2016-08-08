<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter user type name']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('price', 'Price') !!}
        {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Enter user type name']) !!}
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('duration') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('duration', 'Duration') !!}
        {!! Form::text('duration', null, ['class' => 'form-control', 'placeholder' => 'Enter user type duration']) !!}
        {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>