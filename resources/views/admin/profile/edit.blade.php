@extends('admin.layouts.app')

@section('content')
    <h1>Edit {{ $admin->name }} Profile</h1>

    {!! Form::model($admin, [
        'method' => 'PATCH',
        'url' => ['admin/profile', $admin->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

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
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email', 'readonly']) !!}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <div class="form-control">
                {!! Form::checkbox('change_password', 1, null, ['id' => 'change_password']) !!}
                {!! Form::label('Change Password') !!}
            </div>
        </div>
    </div>

    <div class="form-group password hidden {{ $errors->has('new_password') ? 'has-error' : ''}}">
        <div class="col-sm-12">
            {!! Form::label('new_password', 'Password') !!}
            <div class="input-group">
                {!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'Enter new password']) !!}
                <span class="input-group-addon" id="show_password"><i class="glyphicon glyphicon-eye-open"></i></span>
            </div>
            {!! $errors->first('new_password', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('image_file') ? 'has-error' : ''}}">
        <div class="col-sm-12">
            {!! Form::label('image_file', 'Image') !!}
            {!! Form::file('image_file', ['class' => 'form-control']) !!}
            {!! $errors->first('image_file', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@endsection

@section('main-scripts')
    <script>
        $(document).ready(function () {

            showPassword($('#change_password'));

            $('#change_password').on('change', function () {
                showPassword($(this));
            });

        });

        function showPassword(input) {
            if (input.is(':checked')) {
                $('.password').removeClass('hidden');
                $('.password input').val('');
            } else {
                $('.password').addClass('hidden');
                $('.password input').val('');
            }

            $('#show_password').mousedown(function () {
                $('#new_password').prop('type', 'text');
            }).mouseup(function () {
                $('#new_password').prop('type', 'password');
            })
        }

    </script>
@endsection