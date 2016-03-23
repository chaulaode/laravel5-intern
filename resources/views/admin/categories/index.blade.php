@extends('admin.layouts.layout')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{!! trans('back/blog.cates') !!}</h3>
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
                        <h2>{!! trans('back/blog.all-cates') !!}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <button type="button" class="btn btn-dark btn-sm" onclick="window.location='categories/create'">{!! trans('back/blog.cate-create') !!}</button>
                            </li>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!-- start project list -->
                        <table class="table table-hover table-striped table-bordered jambo_table">
                            <thead>
                            <tr>
                                <th style="width: 1%">{!! trans('back/blog.id') !!}</th>
                                <th>{!! trans('back/blog.title') !!}</th>
                                <th style="width: 20%">{!! trans('back/blog.action') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>
                                    <a>{{ $category->category }}</a>
                                    <br />
                                    <small>{{ $category->created_at }}</small>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.categories.destroy', $category->id]]) !!}
                                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> {!! trans('back/blog.view') !!} </a>
                                    <a href="categories/{{ $category->id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> {!! trans('back/blog.edit') !!} </a>
                                    <button type="submit" class="btn btn-danger btn-xs" value="Delete" onclick="return confirm('{!! trans('back/blog.cate-destroy-warning') !!}')"><i class="fa fa-trash-o"></i> {!! trans('back/blog.destroy') !!} </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- end project list -->

                    </div>
                </div>
            </div>
        </div>
    </div>

@include('admin.layouts.footer')

@endsection
