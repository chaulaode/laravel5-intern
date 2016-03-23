@extends('admin.layouts.layout')
@section('content')
<div class="">
<div class="page-title">
    <div class="title_left">
        <h3>Create New Menu</h3>
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
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Pages</div>
                <div class="panel-body">
                    <!--<ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#">Pages</a></li>
                        <li role="presentation"><a href="#">Posts</a></li>
                        <li role="presentation"><a href="#">Blogs</a></li>
                    </ul>-->
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pages</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Posts</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Blogs</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                @foreach ($pages as $page)
                                  <input type="checkbox" class="flat"> {{$page->title}}
                                    </br></br>
                                @endforeach
                                    <input type="submit" class="btn btn-primary" value="Add to menu">

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                <input type="checkbox" class="flat">  Post 1
                                </br></br>
                                <input type="checkbox" class="flat">  Post 2
                                </br></br>
                                <input type="checkbox" class="flat">  Post 3
                                </br></br>
                                <input type="submit" class="btn btn-primary" value="Add to menu">
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                <input type="checkbox" class="flat">  Blog 1
                                </br></br>
                                <input type="checkbox" class="flat">  Blog 2
                                </br></br>
                                <input type="checkbox" class="flat">  Blog 3

                                </br></br>
                                <input type="submit" class="btn btn-primary" value="Add to menu">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create new menu</div>

                <div class="panel-body">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name of menu">
                    <br>
                    <h2>Menu Structure</h2>
                    Add menu items from the column on the left.
                    </br>
                    <input type="submit" class="btn btn-primary" value="Save">
                    </br>
                    Give your menu a name above, then click Create Menu.
                </div>
            </div>
    </div>
        </div>

</div>
@include('admin.layouts.footer')
@endsection
