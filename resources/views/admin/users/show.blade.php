@extends('admin.layouts.layout')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users Info</h3>
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
        @if(session()->has('ok'))
            @include('partials.error', ['type' => 'success', 'message' => session('ok')])
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>{{ trans('back/users.name') . ' : ' .  $user->username }}</h3>
                    </div>
                    <div class="x_content">
                        <p>{{ trans('back/users.email') . ' : ' .  $user->email }}</p>
                        <p>{{ trans('back/users.role') . ' : ' .  $user->role->title }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.footer')

@endsection
