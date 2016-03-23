@extends('admin.layouts.layout')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pages</h3>
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
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Pages</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <button type="button" formaction ="admin/pages/create"class="btn"><a href="/admin/pages/create">Create New Page</a></button>
                            </li>
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
                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 1%">Page ID</th>
                                <th style="width: 20%">Title</th>
                                <th style="width: 20%">Published</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pages as $page)
                            <tr id ="{{$page->id}}">
                                <td>{{$page->id}}</td>
                                <td>{{$page->title}}</td>
                                @if ($page->status == 1)
                                <td>
                                    <input type="checkbox" class="flat" checked="checked">
                                </td>
                                @else
                                    <td><input type="checkbox" class="flat" checked="checked"></td>
                                @endif
                                <td>
                                    <a href="/admin/pages/{{$page->id}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                </td>
                                <td>
                                    <a href="/admin/pages/{{$page->id}}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'action' => ['Backend\PageController@destroy', $page->id]] ) !!}
                                    <input class="btn btn-danger btn-xs " onclick="return confirm('Really destroy this user ?')" type="submit" value="Delete">
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