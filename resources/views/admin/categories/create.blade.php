@extends('admin.categories.form')

@section('title')
    <h2>{!! trans('back/blog.cate-create') !!}</h2>
@stop

@section('form')
    {!! Form::open(['url' => 'admin/categories', 'method' => 'post', 'class' => 'form-horizontal form-label-left']) !!}
@endsection