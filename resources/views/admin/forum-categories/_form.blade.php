<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control name', 'required' => 'required', 'placeholder' => 'Enter name']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('slug', 'Slug') !!}
        {!! Form::text('slug', null, ['class' => 'form-control slug', 'required' => 'required', 'readonly', 'placeholder' => 'Slug auto generates using name']) !!}
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter description']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
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

            $('.name').blur(function () {
                $('.slug').val(convert($(this).val()));
            })
        });

        function convert(x) {
            return String(x).toLowerCase().replace(/[^a-z0-9]/gi, '-').replace(/-{2,}/gi, '-');
        }
    </script>
@endsection