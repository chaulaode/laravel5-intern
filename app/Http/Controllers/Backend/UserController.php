<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Request;


class UserController extends Controller
{
    /**
     * The UserRepository instance.
     *
     * @var UserRepository
     */
    protected $user_gestion;

    /**
     * The RoleRepository instance.
     *
     * @var RoleRepository
     */
    protected $role_gestion;


    /**
     * UserController constructor.
     * @param UserRepository $user_gestion
     * @param RoleRepository $role_gestion
     */
    public function __construct(
        UserRepository $user_gestion,
        RoleRepository $role_gestion
    ) {
        $this->user_gestion = $user_gestion;
        $this->role_gestion = $role_gestion;

        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->indexGo('total');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', $this->role_gestion->getAllSelect());
    }


    /**
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserCreateRequest $request)
    {
        $this->user_gestion->store($request->all());
        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show', ['user' => $this->user_gestion->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user_gestion->find($id);
        return view('admin.users.edit',$this->role_gestion->getAllSelect(),['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        UserUpdateRequest $request,
        $user)
    {
        $this->user_gestion->update($request->all(), $user);

        return redirect('admin/users')->with('ok', trans('back/users.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user_gestion->destroyUser($this->user_gestion->find($id));
        return redirect('admin/users')->with('ok', trans('back/users.destroyed'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param  string $role
     * @param  bool $ajax
     * @return Response
     */
    private function indexGo($role, $ajax = false)
    {
        $counts = $this->user_gestion->counts();
        $users = $this->user_gestion->index(4, $role);
        $links = str_replace('/?', '?', $users->render());
        $roles = $this->role_gestion->all();

        if ($ajax) {
            return response()->json([
                'view' => view('back.users.table', compact('users', 'links', 'counts', 'roles'))->render(),
                'links' => str_replace('/sort/total', '', $links)
            ]);
        }

        return view('admin.users.index', compact('users', 'links', 'counts', 'roles'));
    }
}
