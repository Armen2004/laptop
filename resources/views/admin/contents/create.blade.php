@extends('admin.layouts.app')

@section('content')
    <h1>Create New Content</h1>
    <hr/>

    {!! Form::open(['url' => 'admin/contents', 'class' => 'form-horizontal']) !!}

    <div class="form-group {{ $errors->has('page_id') ? 'has-error' : ''}}">
        <div class="col-sm-12">
            {!! Form::label('page_id', 'Page') !!}
            {!! Form::select('page_id', $pages, null, ['class' => 'form-control', 'placeholder' => 'Select from pages']) !!}
            {!! $errors->first('page_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
        <div class="col-sm-12">
            {!! Form::label('content', 'Content') !!}
            {!! Form::textarea('content', 'Enter content', ['class' => 'form-control', 'id' => 'content']) !!}
            {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('main-scripts')
    <script src="//cdn.ckeditor.com/4.5.8/full/ckeditor.js" type="text/javascript"></script>
    <script src="{{asset('ckfinder/ckfinder.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $("select").select2();
            var config = {
//                fillEmptyBlocks: false,
//                autoParagraph: false,
//                allowedContent: true,
                filebrowserBrowseUrl: '{{url('/ckfinder/samples/full-page-open.html')}}'
//                filebrowserBrowseUrl : '/browser/browse.php',
//                filebrowserUploadUrl : '/uploader/upload.php'
            };

            var editor = CKEDITOR.replace('content', config);
            CKFinder.setupCKEditor( editor );
        });
    </script>
@endsection