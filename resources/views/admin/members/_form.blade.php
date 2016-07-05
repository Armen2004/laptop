<div class="form-group {{ $errors->has('user_type_id') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('user_type_id', 'User Type') !!}
        {!! Form::select('user_type_id', $types, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter new name']) !!}
        {!! $errors->first('user_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter new name']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter email']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

@if(isset($member))

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
@else
    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
        <div class="col-sm-12">
            {!! Form::label('password', 'Password') !!}
            <div class="input-group">
                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter password']) !!}
                <span class="input-group-addon" id="show_password"><i class="glyphicon glyphicon-eye-open"></i></span>
            </div>
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endif
<div class="form-group {{ $errors->has('image_file') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('image_file', 'Image') !!}
        @if(isset($member))
            {!! Form::file('image_file', ['class' => 'form-control']) !!}
        @else
            {!! Form::file('image_file', ['class' => 'form-control', 'required' => 'required']) !!}
        @endif
        {!! $errors->first('image_file', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>

@section('main-scripts')
    <script>
        $(document).ready(function () {

            showPassword($('#change_password'));

            $('#change_password').on('change', function () {
                showPassword($(this));
            });

            $('#show_password, #password').mousedown(function () {
                $('#new_password, #password').prop('type', 'text');
            }).mouseup(function () {
                $('#new_password, #password').prop('type', 'password');
            })

        });

        function showPassword(input) {
            if (input.is(':checked')) {
                $('.password').removeClass('hidden');
                $('.password input').val('');
            } else {
                $('.password').addClass('hidden');
                $('.password input').val('');
            }
        }
    </script>
@endsection