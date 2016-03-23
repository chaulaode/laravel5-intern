@extends('admin.layouts.layout')

@section('head')

    {!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') !!}

    <!-- select2 -->
    <link href="{{asset('back/css/select/select2.min.css')}}" rel="stylesheet">

@endsection

@section('content')

    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3>{!! trans('back/blog.posts') !!}</h3>
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

                        @yield('title')

                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <br />

                        @yield('form')

                        <div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('back/blog.title') !!} <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::control('text', 0, 'title', $errors) !!}
                            </div>
                        </div>

                        <div class="form-group {!! $errors->has('slug') ? 'has-error' : '' !!}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('back/blog.permalink') !!} </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary">{!! url('/') . '/ ' !!}</button>
                                    </span>
                                    {!! Form::text('slug', null, ['id' => 'permalien', 'class' => 'form-control']) !!}
                                </div>
                                <small class="text-danger">{!! $errors->first('slug') !!}</small>
                            </div>
                        </div>

                        <div class="form-group {!! $errors->has('summary') ? 'has-error' : '' !!}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('back/blog.summary') !!} </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::control('textarea', 0, 'summary', $errors) !!}
                            </div>
                        </div>

                        <div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('back/blog.content') !!} </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::control('textarea', 0, 'content', $errors) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('back/blog.tags') !!} </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::control('text', 0, 'tags', $errors, '', isset($tags)? implode(',', $tags) : '') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('back/blog.status') !!} </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{-- Form::checkbox('active', null, null, ['id' => 'active', 'class' => 'flat']) --}}
                                {{ Form::select('active', ['0' => trans('back/blog.hidden'), '1' => trans('back/blog.published')], null, ['class' => 'form-control', 'id' => 'active']) }}
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">{!! trans('back/blog.submit') !!}</button>
                                <button type="button" class="btn btn-primary" onClick="history.go(-1);return true;">{!! trans('back/blog.cancel') !!}</button>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.footer')

@endsection

@section('scripts')

    {!! HTML::script('js/main.js') !!}
    <!-- editor -->
    {!! HTML::script('ckeditor/ckeditor.js') !!}
    <script>

        var config = {
            codeSnippet_theme: 'Monokai',
            language: '{{ config('app.locale') }}',
            height: 100,
            filebrowserBrowseUrl: '{!! url($url) !!}',
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

        CKEDITOR.replace( 'summary', config);
        config['height'] = 400;
        CKEDITOR.replace( 'content', config);

        $("#title").keyup(function(){
            var str = sansAccent($(this).val());
            str = str.replace(/[^a-zA-Z0-9\s]/g,"");
            str = str.toLowerCase();
            str = str.replace(/\s/g,'-');
            $("#permalien").val(str);
        });

    </script>
    <!-- /editor -->

    <!-- select2 -->
    <script src="{{asset('back/js/select/select2.full.js')}}"></script>
    <script>
        $(document).ready(function() {
            $(".select2_single").select2({
                placeholder: "Select a state",
                allowClear: true
            });
            $(".select2_group").select2({});
            $(".select2_multiple").select2({
                maximumSelectionLength: 4,
                placeholder: "With Max Selection limit 4",
                allowClear: true
            });
        });
    </script>
    <!-- /select2 -->

    <!-- input tags -->
    <script src="{{asset('back/js/tags/jquery.tagsinput.min.js')}}"></script>
    <script>
        function onAddTag(tag) {
            alert("Added a tag: " + tag);
        }
        function onRemoveTag(tag) {
            alert("Removed a tag: " + tag);
        }
        function onChangeTag(input, tag) {
            alert("Changed a tag: " + tag);
        }
        $(function() {
            $('#tags').tagsInput({
                width: 'auto'
            });
        });
    </script>
    <!-- /input tags -->

@endsection
