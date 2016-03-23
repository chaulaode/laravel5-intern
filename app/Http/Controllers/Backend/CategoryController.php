<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        Category::create($request->all());

        return redirect('admin/categories')->with('ok', trans('back/blog.cate-stored'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect('admin/categories')->with('ok', trans('back/blog.cate-updated'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        DB::table('post_category')->where('category_id', '=', $id)->delete();
        $category->delete();

        return redirect('admin/categories')->with('ok', trans('back/blog.cate-destroyed'));
    }
}
