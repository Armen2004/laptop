<div class="form-group {{ $errors->has('forum_topic_id') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('forum_topic_id', 'Forum Topic') !!}
        {!! Form::select('forum_topic_id', $topics, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Select forum post']) !!}
        {!! $errors->first('forum_topic_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <div class="form-control">
            {!! Form::checkbox('replay', 1, null) !!}
            {!! Form::label('Replay') !!}
        </div>
    </div>
</div>

<div class="form-group parent hidden {{ $errors->has('parent_id') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('parent_id', 'Parent') !!}
        {!! Form::select('parent_id', $post_list, null, ['class' => 'form-control', 'placeholder' => 'Select forum comment']) !!}
        {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('comment', 'Comment') !!}
        {!! Form::textarea('comment', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter comment']) !!}
        {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
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

            showPassword($("input[name='replay']"));

            $("input[name='replay']").on('change', function () {
                showPassword($(this));
            });

        });

        function showPassword(input) {
            if (input.is(':checked')) {
                $('.parent').removeClass('hidden');
            } else {
                $('.parent').addClass('hidden');
            }
        }

    </script>
@endsection