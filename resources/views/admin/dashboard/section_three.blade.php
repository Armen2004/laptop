<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Recently Added Courses</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    @foreach($last_4_courses as $last_4_course)
                        <li class="item">
                            <div class="product-img">
                                <img src="{{ $last_4_course->image ? env('S3_PATH') . $last_4_course->image : '/img/default-50x50.gif' }}" alt="{{ $last_4_course->name }}">
                            </div>
                            <div class="product-info">
                                <a href="{{ url('admin/courses', $last_4_course->slug) }}" class="product-title">{{ $last_4_course->name }}
                                    <span class="label label-{{ $last_4_course->status ? "warning" : "success"}} pull-right">{{ $last_4_course->status ? "Archived" : "Not Archived"}}</span>
                                </a>
                                <span class="product-description">
                                  {{ $last_4_course->description }}
                                </span>
                            </div>
                        </li>
                        <!-- /.item -->
                    @endforeach
                </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="{{ url('admin/courses') }}" class="uppercase">View All Courses</a>
            </div>
            <!-- /.box-footer -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Recently Added Lessons</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    @foreach($last_4_lessons as $last_4_lesson)
                        <li class="item">
                            <div class="product-img">
                                <img src="{{ $last_4_lesson->image ? env('S3_PATH') . $last_4_lesson->image : '/img/default-50x50.gif' }}" alt="{{ $last_4_lesson->title }}">
                            </div>
                            <div class="product-info">
                                <a href="{{ url('admin/lessons/' . $last_4_lesson->course->slug, $last_4_lesson->slug) }}" class="product-title">{{ $last_4_lesson->title }}
                                    <span class="label label-{{ $last_4_lesson->status ? "warning" : "success"}} pull-right">{{ $last_4_lesson->status ? "Archived" : "Not Archived"}}</span></a>
                                <span class="product-description">
                                  {{ $last_4_lesson->description }}
                                </span>
                            </div>
                        </li>
                        <!-- /.item -->
                    @endforeach
                </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="{{ url('admin/lessons') }}" class="uppercase">View All Lessons</a>
            </div>
            <!-- /.box-footer -->
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Recently Added Forum Topics</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    @foreach($last_4_topics as $last_4_topic)
                        <li class="item">
                            <div class="product-info" style="margin-left: 0px;">
                                <a href="{{ url('admin/forum-topics', $last_4_topic->slug) }}" class="product-title">{{ $last_4_topic->title }}</a>
                                {!! \App\FormHelperClass::delete_form('DELETE', 'admin/forum-topics/' . $last_4_topic->id, "Topic", "pull-right") !!}
                                <span class="product-description" style="white-space: normal;">
                                  {{ str_limit($last_4_topic->description, 300) }}
                                </span>
                            </div>
                        </li>
                        <!-- /.item -->
                    @endforeach
                </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="{{ url('admin/forum-topics') }}" class="uppercase">View All Forum Topics</a>
            </div>
            <!-- /.box-footer -->
        </div>

    </div>
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Recently Added Forum Posts</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    @foreach($last_4_posts as $last_4_post)
                        <li class="item">
                            <div class="product-info" style="margin-left: 0px;">
                                <a href="{{ url('admin/forum-posts', $last_4_post->id) }}" class="product-title">{{ $last_4_post->forumTopic->title }}</a>
                                {!! \App\FormHelperClass::delete_form('DELETE', 'admin/forum-posts/' . $last_4_post->id, "Post", "pull-right") !!}
                                <span class="product-description" style="white-space: normal;">
                                  {{ str_limit($last_4_post->comment, 300) }}
                                </span>
                            </div>
                        </li>
                        <!-- /.item -->
                    @endforeach
                </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="{{ url('admin/forum-posts') }}" class="uppercase">View All Forum Posts</a>
            </div>
            <!-- /.box-footer -->
        </div>

    </div>
</div>