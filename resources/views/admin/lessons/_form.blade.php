<div class="row">
    <div class="col-sm-6">

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

        <div class="form-group {{ $errors->has('video_length') ? 'has-error' : ''}}">
            <div class="col-sm-12">
                {!! Form::label('video_length', 'Video Length') !!}
                {!! Form::number('video_length', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter lesson video length']) !!}
                {!! $errors->first('video_length', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

    </div>
    <div class="col-sm-6">

        <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
            <div class="col-sm-12">
                {!! Form::label('file', 'Video') !!}
                {!! Form::file('file', ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

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
    <script src="//cdn.ckeditor.com/4.5.8/full/ckeditor.js" type="text/javascript"></script>
    <script src="{{asset('ckfinder/ckfinder.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {

            $('#course').change(function () {
                if($(this).val()) {
                    getCourse($(this).val());
                }else{
                    $('#url').text('{{ url('lessons') }}/')
                }
            });

            showPrice($('.type'));

            $('#course_type_id').change(function () {
                showPrice($(this))
            });

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

        function getCourse(id) {
            $.ajax({
                url: "{{url('admin/lessons/course')}}",
                type: "POST",
                data: { _token: "{{csrf_token()}}", id:id},
                dataType: "json",
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                    $('#url').text('{{ url('lessons') }}/' + data.slug + '/')
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('error');
                    console.log(jqXHR);
                }
            });
        }

        function showPrice(selector){
            if (selector.val() > 1) {
                $('.price').removeClass('hidden');
            } else {
                $('#price').val('');
                $('.price').addClass('hidden');
            }
        }

        function convert(x) {
            var s = String(x).toLowerCase();
            var test = /[^a-z0-9]/gi;
            return s.replace(test, '-');
        }
    </script>
@endsection