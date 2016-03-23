@extends('admin.posts.form')

@section('title')
    <h2>{!! trans('back/blog.post-create') !!}</h2>
@stop

@section('form')
    {!! Form::open(['url' => 'admin/posts', 'method' => 'post', 'class' => 'form-horizontal form-label-left']) !!}
@endsection