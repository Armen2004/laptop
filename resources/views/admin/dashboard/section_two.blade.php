<div class="row">
    <div class="col-md-12">
        <!-- USERS LIST -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Latest Members</h3>

                <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <ul class="users-list clearfix">
                    @foreach($last_8_users as $last_8_user)
                        <li>
                            <img src="{{ $last_8_user->image ? env('S3_PATH') . $last_8_user->image : '/img/user2-160x160.jpg' }}" alt="{{ $last_8_user->name }}">
                            <a class="users-list-name" href="{{ url('admin/members', $last_8_user->id) }}">{{ $last_8_user->name }}</a>
                            <span class="users-list-date">{{ $last_8_user->created_at->diffForHumans() }}</span>
                        </li>
                    @endforeach
                </ul>
                <!-- /.users-list -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="{{ url('admin/members') }}" class="uppercase">View All Users</a>
            </div>
            <!-- /.box-footer -->
        </div>
        <!--/.box -->
    </div>
</div>