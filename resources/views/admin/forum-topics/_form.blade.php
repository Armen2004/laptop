<div class="row">
    <div class="col-sm-6">

        <div class="form-group {{ $errors->has('forum_category_id') ? 'has-error' : ''}}">
            <div class="col-sm-12">
                {!! Form::label('forum_category_id', 'Channel') !!}
                {!! Form::select('forum_category_id', $categories, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Select Forum Category']) !!}
                {!! $errors->first('forum_category_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <div class="col-sm-12">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class' => 'form-control title', 'required' => 'required', 'placeholder' => 'Enter Title']) !!}
                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
            <div class="col-sm-12">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control slug', 'required' => 'required', 'readonly', 'placeholder' => 'Slug auto generates using name']) !!}
                {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

    </div>
    <div class="col-sm-6">

        <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
            <div class="col-sm-12">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter description']) !!}
                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

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

            $('.title').blur(function () {
                $('.slug').val(convert($(this).val()));
            })
        });

        function convert(x) {
            return String(x).toLowerCase().replace(/[^a-z0-9]/gi, '-').replace(/-{2,}/gi, '-');
        }
    </script>
@endsection