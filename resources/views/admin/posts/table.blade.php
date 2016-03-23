@foreach ($posts as $post)
    <tr>
        <td><a>{{ $post->id }}</a></td>
        <td><a>{{ $post->title }}</a></td>
        <td><a>{{ $post->created_at }}</a></td>
        @if(session('statut') == 'admin')
            <td><a>{{ $post->username }}</a></td>
        @endif
        <td>
            @if ($post->active)
                <span class="label label-success">{!! trans('back/blog.published') !!}</span>
            @else
                <span class="label label-default">{!! trans('back/blog.hidden') !!}</span>
            @endif
        </td>
        <td>
            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.posts.destroy', $post->id]]) !!}
            <a href="../blog/{{ $post->slug }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> {!! trans('back/blog.view') !!} </a>
            <a href="posts/{{ $post->id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> {!! trans('back/blog.edit') !!} </a>
            <button type="submit" class="btn btn-danger btn-xs" value="Delete" onclick="return confirm('Really destroy this post ?')"><i class="fa fa-trash-o"></i> {!! trans('back/blog.destroy') !!} </button>
            {!! Form::close() !!}
        </td>
    </tr>
@endforeach
