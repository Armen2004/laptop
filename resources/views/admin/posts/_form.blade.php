<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control title', 'required' => 'required', 'placeholder' => 'Enter post title']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('slug', 'Slug') !!}
        <div class="input-group">
            <span class="input-group-addon" id="slug">{{ url('posts') }}/</span>
            {!! Form::text('slug', null, ['class' => 'form-control slug', 'required' => 'required', 'readonly', 'placeholder' => 'Slug auto generates using title', 'aria-describedby' => 'slug']) !!}
        </div>
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('description', 'Description') !!}
        @if(isset($post))
            {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'content']) !!}
        @else
            {!! Form::textarea('description', 'Enter post description', ['class' => 'form-control', 'required' => 'required', 'id' => 'content']) !!}
        @endif
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('image_file') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('image_file', 'Image') !!}
        @if(isset($post))
            {!! Form::file('image_file', ['class' => 'form-control']) !!}
        @else
            {!! Form::file('image_file', ['class' => 'form-control', 'required' => 'required']) !!}
        @endif
        {!! $errors->first('image_file', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <div class="form-control">
            {!! Form::checkbox('status', 1, null) !!}
            {!! Form::label('Archive') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>
@if(isset($post->image))
    <div class="row">
        <div class="col-sm-12">
            <div class="thumbnail">
                <img src="{{ env('S3_PATH') . $post->image }}" alt="{{ $post->title }}">
            </div>
        </div>
    </div>
@endif

@section('main-scripts')
    <script src="{{asset('ckeditor/ckeditor.js')}}" type="text/javascript"></script>
    <script src="{{asset('ckfinder/ckfinder.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            var config = {
                filebrowserBrowseUrl: '{{url('/ckfinder/samples/full-page-open.html')}}',
                autoParagraph: false,
                toolbar: 'Full',
                enterMode : CKEDITOR.ENTER_BR,
                shiftEnterMode: CKEDITOR.ENTER_P,
                format_tags: 'p;h1;h2;h3;h4;h5;h6;address;div'
            };

            var editor = CKEDITOR.replace('content', config);
            CKFinder.setupCKEditor(editor);

            $('.title').blur(function () {
                $('.slug').val(convert($(this).val()));
            })
        });

        function convert(x) {
            return String(x).toLowerCase().replace(/[^a-z0-9]/gi, '-').replace(/-{2,}/gi, '-');
        }
    </script>
@endsection

