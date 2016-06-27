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
</div>
<div class="col-sm-6">
    <div class="form-group {{ $errors->has('course_type_id') ? 'has-error' : ''}}">
        <div class="col-sm-12">
            {!! Form::label('course_type_id', 'Course type') !!}
            {!! Form::select('course_type_id', $types, null, ['class' => 'form-control type', 'required' => 'required', 'placeholder' => 'Select course type']) !!}
            {!! $errors->first('course_type_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group hidden price {{ $errors->has('price') ? 'has-error' : ''}}">
        <div class="col-sm-12">
            {!! Form::label('price', 'Price') !!}
            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Enter course price']) !!}
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
            {!! Form::textarea('description', 'Enter course name', ['class' => 'form-control', 'required' => 'required', 'id' => 'content']) !!}
        @endif
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>

@section('main-scripts')
    <script src="//cdn.ckeditor.com/4.5.8/full/ckeditor.js" type="text/javascript"></script>
    <script src="{{asset('ckfinder/ckfinder.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
//            $("select").select2({
//                minimumResultsForSearch: Infinity
//            });

            showPrice($('.type'));

            $('select').change(function () {
                showPrice($(this))
            });

            function showPrice(selector){
                if (selector.val() > 1) {
                    $('.price').removeClass('hidden');
                } else {
                    $('#price').val('');
                    $('.price').addClass('hidden');
                }
            }

            var config = {
//                fillEmptyBlocks: false,
//                autoParagraph: false,
//                allowedContent: true,
                filebrowserBrowseUrl: '{{url('/ckfinder/samples/full-page-open.html')}}'
//                filebrowserBrowseUrl : '/browser/browse.php',
//                filebrowserUploadUrl : '/uploader/upload.php'
            };

            var editor = CKEDITOR.replace('content', config);
            CKFinder.setupCKEditor(editor);

            $('.name').blur(function () {
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