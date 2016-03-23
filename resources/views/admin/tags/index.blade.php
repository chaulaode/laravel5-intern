@extends('admin.layouts.layout')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{!! trans('back/blog.tags') !!}</h3>
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
                        <h2>{!! trans('back/blog.all-tags') !!}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <button type="button" class="btn btn-dark btn-sm" onclick="window.location='tags/create'">{!! trans('back/blog.tag-create') !!}</button>
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
                            @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>
                                    <a>{{ $tag->tag }}</a>
                                    <br />
                                    <small>{{ $tag->created_at }}</small>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.tags.destroy', $tag->id]]) !!}
                                    <a href="../blog/tag?tag={!! $tag->id !!}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> {!! trans('back/blog.view') !!} </a>
                                    <a href="tags/{{ $tag->id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> {!! trans('back/blog.edit') !!} </a>
                                    <button type="submit" class="btn btn-danger btn-xs" value="Delete" onclick="return confirm('{!! trans('back/blog.tag-destroy-warning') !!}')"><i class="fa fa-trash-o"></i> {!! trans('back/blog.destroy') !!} </button>
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
