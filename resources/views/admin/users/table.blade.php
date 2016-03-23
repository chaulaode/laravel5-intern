@foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>
            <a>{{ $user->username }}</a>
            <br />
            <small>Created {{ $user->created_at }}</small>
        </td>
        <td>
            <a>{{ $user->role->title }}</a>
        </td>
        <td>
            <a>{{ $user->email }}</a>
        </td>
        <td>
            {!! Form::open(['method' => 'DELETE', 'action' => ['Backend\UserController@destroy', $user->id]]) !!}
            <a href="/admin/users/{{$user->id}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
            <a href="/admin/users/{{$user->id}}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
            <button type="submit" class="btn btn-danger btn-xs" value="Delete" onclick="return confirm('Really destroy this post ?')"><i class="fa fa-trash-o"></i> Delete </button>
            {!! Form::close() !!}
        </td>
    </tr>
@endforeach