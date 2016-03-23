<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\PostRequest;
use App\Repositories\BlogRepository;
use App\Repositories\UserRepository;

class PostController extends Controller
{
    protected $blog_gestion;
    protected $user_gestion;
    protected $nbrPages;

    public function __construct(
        BlogRepository $blog_gestion,
        UserRepository $user_gestion)
    {
        $this->user_gestion = $user_gestion;
        $this->blog_gestion = $blog_gestion;
        $this->nbrPages = 2;

        $this->middleware('redac', ['except' => ['indexFront', 'show', 'tag', 'search']]);
        $this->middleware('ajax', ['only' => ['indexOrder', 'updateSeen', 'updateActive']]);
    }

    public function indexFront()
    {
        $posts = $this->blog_gestion->indexFront($this->nbrPages);
        $links = str_replace('/?', '?', $posts->render());

        return view('front.blog.index', compact('posts', 'links'));
    }

    public function index(Guard $auth)
    {
        $statut = $this->user_gestion->getStatut();
        $posts = $this->blog_gestion->index(10, $statut == 'admin' ? null : $auth->user()->id);

        $links = str_replace('/?', '?', $posts->render());

        return view('admin.posts.index', compact('posts', 'links'));
    }

    public function create()
    {
        $url = config('medias.url');

        return view('admin.posts.create')->with(compact('url'));
    }

    public function store(PostRequest $request)
    {
        $this->blog_gestion->store($request->all(), $request->user()->id);

        return redirect('admin/posts')->with('ok', trans('back/blog.stored'));
    }

    public function show(
        Guard $auth,
        $slug)
    {
        $user = $auth->user();

        return view('front.blog.show',  array_merge($this->blog_gestion->show($slug), compact('user')));
    }

    public function edit(
        UserRepository $user_gestion,
        $id)
    {
        $url = config('medias.url');

        return view('admin.posts.edit',  array_merge($this->blog_gestion->edit($id), compact('url')));
    }

    public function update(
        PostRequest $request,
        $id)
    {
        $this->blog_gestion->update($request->all(), $id);

        return redirect('admin/posts')->with('ok', trans('back/blog.updated'));
    }

    public function destroy($id)
    {
        $this->blog_gestion->destroy($id);

        return redirect('admin/posts')->with('ok', trans('back/blog.destroyed'));
    }
}
