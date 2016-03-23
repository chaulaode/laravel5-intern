@extends('admin.layouts.layout')

@section('content')

    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3>Create New User</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create Form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <br />
                        {!! Form::open(['url' => 'admin/users', 'method' => 'post', 'class' => 'form-horizontal form-label-left']) !!}
                            {!! Form::control('text', 0, 'username', $errors, trans('back/users.name')) !!}
                            {!! Form::control('email', 0, 'email', $errors, trans('back/users.email')) !!}
                            {!! Form::control('password', 0, 'password', $errors, trans('back/users.password')) !!}
                            {!! Form::control('password', 0, 'password_confirmation', $errors, trans('back/users.confirm-password')) !!}
                            {!! Form::selection('role', $select, null, trans('back/users.role')) !!}
                            {!! Form::submit(trans('front/form.send')) !!}
                        {!! Form::close() !!}

                        <!--
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="password_confirmation" name="password_confirmation" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="role" name="role">
                                        <option value="1">Administrator</option>
                                        <option value="2">Redactor</option>
                                        <option value="3">User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                                    <a href="/admin/users" class="btn btn-primary">Cancel</a>
                                </div>
                            </div>

                               -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('admin.layouts.footer')

@endsection
