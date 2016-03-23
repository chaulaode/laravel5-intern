<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        Tag::create($request->all());

        return redirect('admin/tags')->with('ok', trans('back/blog.tag-stored'));
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return view('admin.tags.edit',compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($request->all());

        return redirect('admin/tags')->with('ok', trans('back/blog.tag-updated'));
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        DB::table('post_tag')->where('tag_id', '=', $id)->delete();
        $tag->delete();

        return redirect('admin/tags')->with('ok', trans('back/blog.tag-destroyed'));
    }
}
