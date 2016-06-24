<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter blog title']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('short_description') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('short_description', 'Short Description') !!}
        {!! Form::text('short_description', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter blog short description']) !!}
        {!! $errors->first('short_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('description', 'Description') !!}
        @if(isset($blog))
            {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'content']) !!}
        @else
            {!! Form::textarea('description', 'Enter blog description', ['class' => 'form-control', 'required' => 'required', 'id' => 'content']) !!}
        @endif
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('file', 'Image') !!}
        @if(isset($blog))
            {!! Form::file('file', ['class' => 'form-control']) !!}
        @else
            {!! Form::file('file', ['class' => 'form-control', 'required' => 'required']) !!}
        @endif
        {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>
@if(isset($blog->image))
    <div class="row">
        <div class="col-sm-12">
            <div class="thumbnail">
                <img src="{{asset('img/blog/' .$blog->image)}}" alt="{{$blog->title}}">
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
        });
    </script>
@endsection