<div class="col-sm-6">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <div class="col-sm-12">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control name', 'required' => 'required', 'placeholder' => 'Enter course name']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
        <div class="col-sm-12">
            {!! Form::label('slug', 'Slug') !!}
            <div class="input-group">
                <span class="input-group-addon" id="slug">{{ url('courses') }}/</span>
                {!! Form::text('slug', null, ['class' => 'form-control slug', 'required' => 'required', 'readonly', 'placeholder' => 'Slug auto generates using name', 'aria-describedby' => 'slug']) !!}
            </div>
            {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

</div>
<div class="col-sm-6">

    <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
        <div class="col-sm-12">
            {!! Form::label('file', 'Image') !!}
            @if(isset($course))
                {!! Form::file('file', ['class' => 'form-control']) !!}
            @else
                {!! Form::file('file', ['class' => 'form-control', 'required' => 'required']) !!}
            @endif
            {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12" style="margin-top: 25px">
            <div class="form-control">
                {!! Form::checkbox('status', 1, null) !!}
                {!! Form::label('Publish') !!}
            </div>
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('description', 'Description') !!}
        @if(isset($course))
            {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'content']) !!}
        @else
            {!! Form::textarea('description', 'Enter course description', ['class' => 'form-control', 'required' => 'required', 'id' => 'content']) !!}
        @endif
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>

@if(isset($course->image))
    <div class="row">
        <div class="col-sm-12">
            <div class="thumbnail">
                <img src="{{ env('S3_PATH') . $course->image }}" alt="{{ $course->title }}">
            </div>
        </div>
    </div>
@endif

@section('main-scripts')
    <script src="//cdn.ckeditor.com/4.5.8/full/ckeditor.js" type="text/javascript"></script>
    <script src="{{asset('ckfinder/ckfinder.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {

            var config = {
                filebrowserBrowseUrl: '{{url('/ckfinder/samples/full-page-open.html')}}'
            };

            var editor = CKEDITOR.replace('content', config);
            CKFinder.setupCKEditor(editor);

            $('.name').blur(function () {
                $('.slug').val(convert($(this).val()));
            })
        });

        function convert(x) {
            return String(x).toLowerCase().replace(/[^a-z0-9]/gi, '-').replace(/-{2,}/gi, '-');
        }
    </script>
@endsection