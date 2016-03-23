@extends('admin.categories.form')

@section('title')
    <h2>{!! trans('back/blog.cate-edit') !!}</h2>
@stop

@section('form')
    {!! Form::model($category, ['route' => ['admin.categories.update', $category->id], 'method' => 'put', 'class' => 'form-horizontal form-label-left']) !!}
@endsection
