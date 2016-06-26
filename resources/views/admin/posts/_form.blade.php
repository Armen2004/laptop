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
        {!! Form::text('slug', null, ['class' => 'form-control slug', 'required' => 'required', 'readonly', 'placeholder' => 'Slug auto generates using title']) !!}
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
<div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('file', 'Image') !!}
        @if(isset($post))
            {!! Form::file('file', ['class' => 'form-control']) !!}
        @else
            {!! Form::file('file', ['class' => 'form-control', 'required' => 'required']) !!}
        @endif
        {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <div class="form-control">
            {!! Form::checkbox('status', 1, null) !!}
            {!! Form::label('Publish') !!}
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
                <img src="{{asset($post->image)}}" alt="{{$post->title}}">
            </div>
        </div>
    </div>
@endif

@section('main-scripts')
    <script src="//cdn.ckeditor.com/4.5.8/full/ckeditor.js" type="text/javascript"></script>
    <script src="{{asset('ckfinder/ckfinder.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $("select").select2();
            var config = {
                filebrowserBrowseUrl: '{{url('/ckfinder/samples/full-page-open.html')}}'
//                filebrowserBrowseUrl : '/browser/browse.php',
//                filebrowserUploadUrl : '/uploader/upload.php'
            };

            var editor = CKEDITOR.replace('content', config);
            CKFinder.setupCKEditor(editor);

            $('.title').blur(function () {
                $('.slug').val(convert($(this).val()));
            })
        });

        function convert(x) {
            var s = String(x).toLowerCase();
            var test = /[^a-z0-9]/gi;
            return s.replace(test, '-');
        }
    </script>
@endsection