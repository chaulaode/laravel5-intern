@extends('admin.layouts.layout')

@section('content')

    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3>Edit Page</h3>
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
                        {!! Form::model($page, ['route' => ['admin.pages.update', $page->id], 'method' => 'put', 'class' => 'form-horizontal form-label-left']) !!}
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input type="hidden" id="hidden" name="hidden" value="{{$page->description}}">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" name="name" value="{{$page->title}}" required="required" class="form-control col-md-7 col-xs-12">
                                    <input type ="hidden" name="id">
                                </div>
                            </div>
                        {!! Form::control('textarea', 0, 'content', $errors, trans('back/blog.content')) !!}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Published </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @if($page->status==1)
                                         <input type="checkbox" id="status" name="status" class="flat" checked="checked">
                                    @else
                                         <input type="checkbox" id="status" name="status" class="flat">
                                    @endif
                                </div>
                            </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="submit" class="btn btn-primary">Cancel</button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    {!! HTML::script('ckeditor/ckeditor.js') !!}

    <script>
        var description = $('#hidden').val();
        var config = {
            codeSnippet_theme: 'Monokai',
            language: '{{ config('app.locale') }}',
            height: 100,
            toolbarGroups: [
                { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others' },
                //'/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                { name: 'styles' },
                { name: 'colors' }
            ]
        };

        config['height'] = 400;

        CKEDITOR.replace( 'content', config);
        CKEDITOR.instances['content'].setData(description);
    </script>
@stop

@include('admin.layouts.footer')

@endsection
