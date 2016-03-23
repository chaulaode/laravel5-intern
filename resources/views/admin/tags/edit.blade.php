@extends('admin.tags.form')

@section('title')
    <h2>{!! trans('back/blog.tag-edit') !!}</h2>
@stop

@section('form')
    {!! Form::model($tag, ['route' => ['admin.tags.update', $tag->id], 'method' => 'put', 'class' => 'form-horizontal form-label-left']) !!}
@endsection
