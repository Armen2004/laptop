<div class="row">
    <div class="col-sm-6">

        <div class="form-group {{ $errors->has('user_type_id') ? 'has-error' : ''}}">
            <div class="col-sm-12">
                {!! Form::label('user_type_id', 'User type') !!}
                {!! Form::select('user_type_id', $types, null, ['class' => 'form-control type', 'required' => 'required', 'placeholder' => 'Select course type']) !!}
                {!! $errors->first('user_type_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('course_id') ? 'has-error' : ''}}">
            <div class="col-sm-12">
                {!! Form::label('course_id', 'Course') !!}
                {!! Form::select('course_id', $courses, null, ['class' => 'form-control', 'id' => 'course', 'required' => 'required', 'placeholder' => 'Enter lesson title']) !!}
                {!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <div class="col-sm-12">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class' => 'form-control title', 'required' => 'required', 'placeholder' => 'Enter lesson title']) !!}
                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
            <div class="col-sm-12">
                {!! Form::label('slug', 'Slug') !!}
                <div class="input-group">
                    <span class="input-group-addon" id="url">{{ url('lessons') }}/</span>
                    {!! Form::text('slug', null, ['class' => 'form-control slug', 'required' => 'required', 'readonly', 'placeholder' => 'Slug auto generates using title', 'aria-describedby' => 'url']) !!}
                </div>
                {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12" style="margin-top: 25px">
                <div class="form-control">
                    {!! Form::checkbox('status', 1, null) !!}
                    {!! Form::label('Archive') !!}
                </div>
            </div>
        </div>

    </div>
    <div class="col-sm-6">

        <div class="form-group {{ $errors->has('video_file') ? 'has-error' : ''}}">
            <div class="col-sm-12">
                {!! Form::label('video_file', 'Video') !!}
                {!! Form::file('video_file', ['class' => 'form-control']) !!}
                {!! $errors->first('video_file', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('video_link') ? 'has-error' : ''}}">
            <div class="col-sm-12">
                {!! Form::label('video_link', 'or Video link') !!}
                @if(isset($lesson))
                    {!! Form::text('video_link', $lesson->video, ['class' => 'form-control', 'placeholder' => 'Enter lesson video or link']) !!}
                @else
                    {!! Form::text('video_link', null, ['class' => 'form-control', 'placeholder' => 'Enter lesson video or link']) !!}
                @endif
                {!! $errors->first('video_link', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('video_length') ? 'has-error' : ''}}">
            <div class="col-sm-12">
                {!! Form::label('video_length', 'Video Length/Seconds') !!}
                {!! Form::number('video_length', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter lesson video length']) !!}
                {!! $errors->first('video_length', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('image_file') ? 'has-error' : ''}}">
            <div class="col-sm-12">
                {!! Form::label('image_file', 'Lesson Image') !!}
                {!! Form::file('image_file', ['class' => 'form-control']) !!}
                {!! $errors->first('image_file', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('pdf_file') ? 'has-error' : ''}}">
            <div class="col-sm-12">
                {!! Form::label('pdf_file', 'PDF file') !!}
                @if(isset($lesson))
                    {!! Form::file('pdf_file', ['class' => 'form-control']) !!}
                @else
                    {!! Form::file('pdf_file', ['class' => 'form-control', 'required' => 'required']) !!}
                @endif
                {!! $errors->first('pdf_file', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('description', 'Description') !!}
        @if(isset($lesson))
            {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'content']) !!}
        @else
            {!! Form::textarea('description', 'Enter lesson description', ['class' => 'form-control', 'required' => 'required', 'id' => 'content']) !!}
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
    <script src="{{asset('ckeditor/ckeditor.js')}}" type="text/javascript"></script>
    <script src="{{asset('ckfinder/ckfinder.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {

            if($('#course').val() > 0) {
                getCourse($('#course').val())
            }

            $('#course').change(function () {
                if($(this).val()) {
                    getCourse($(this).val());
                }else{
                    $('#url').text('{{ url('lessons') }}/')
                }
            });

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

        function getCourse(id) {
            $.ajax({
                url: "{{url('admin/lessons/course')}}",
                type: "POST",
                data: { _token: "{{csrf_token()}}", id:id},
                dataType: "json",
                success: function (data, textStatus, jqXHR) {
                    $('#url').text('{{ url('lessons') }}/' + data.slug + '/')
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('error');
                    console.log(jqXHR);
                }
            });
        }

        function convert(x) {
            return String(x).toLowerCase().replace(/[^a-z0-9]/gi, '-').replace(/-{2,}/gi, '-');
        }
    </script>
@endsection