@extends('admin.posts.form')

@section('title')
    <h2>{!! trans('back/blog.post-edit') !!}</h2>
@stop

@section('form')
    {!! Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal form-label-left']) !!}
@endsection
