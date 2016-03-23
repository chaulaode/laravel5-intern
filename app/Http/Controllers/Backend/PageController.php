<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\Categories;
use Input;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.index',['pages'=>Pages::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Pages();
        $page->title = $request->input('name');
        $page->description = $request->input('content');
        if (Input::has('status'))
            $page->status = 1;
        else
            $page->status = 0;
        //$page->author_id = Input::get('author');
        $page->save();
        return redirect()->to('/admin/pages');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $page = Pages::where('id', $id)->first();
        return view('admin.pages.edit', ['page' => $page]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $page = Pages::where('id', $id)->first();
        return view('admin.pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $page = Pages::where('id', $id)->first();
        $page->title = Input::get('name');
        $page->description = Input::get('content');
        if (Input::has('status'))
            $page->status = 1;
        else
            $page->status = 0;
        //$page->author_id = Input::get('author');
        $page->save();
        return view('admin.pages.index', ['pages' => Pages::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Pages::where('id', $id)->delete();
        return view('admin.pages.index', ['pages' => Pages::all()]);
    }
}
