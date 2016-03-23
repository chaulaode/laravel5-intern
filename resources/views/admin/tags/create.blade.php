@extends('admin.tags.form')

@section('title')
    <h2>{!! trans('back/blog.tag-create') !!}</h2>
@stop

@section('form')
    {!! Form::open(['url' => 'admin/tags', 'method' => 'post', 'class' => 'form-horizontal form-label-left']) !!}
@endsection