<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter notification title']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('custom_notification_content') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('custom_notification_content', 'Content') !!}
        @if(isset($notification))
            {!! Form::textarea('custom_notification_content', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'content']) !!}
        @else
            {!! Form::textarea('custom_notification_content', 'Enter notification content', ['class' => 'form-control', 'required' => 'required', 'id' => 'content' ]) !!}
        @endif
        {!! $errors->first('custom_notification_content', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>

@section('main-scripts')
    <script src="{{asset('ckeditor/ckeditor.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
           CKEDITOR.replace('content');
        });

    </script>
@endsection