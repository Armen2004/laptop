<div class="form-group {{ $errors->has('user_type_id') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('user_type_id', 'User Type') !!}
        {!! Form::select('user_type_id', $types, null, ['class' => 'form-control', 'placeholder' => 'Enter new name']) !!}
        {!! $errors->first('user_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter new name']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('email', 'Email') !!}
        @if(isset($member))
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email', 'readonly']) !!}
        @else
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email']) !!}
        @endif
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('password', 'Password') !!}
        {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Enter new password']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('file', 'Image') !!}
        {!! Form::file('file', ['class' => 'form-control']) !!}
        {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>