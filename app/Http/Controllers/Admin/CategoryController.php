<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|unique:categories|max:255'
        ]);

        $category = new Category;
        $category->category_name = $request->input('category_name');
        $category->save();

        return redirect(route('category.index'))->with('toast_success', 'Category created Successfully');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'category_name' => 'required|unique:categories|max:255'
        // ]);

        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:categories|min:2|max:255',
        ]);
    
        if ($validator->fails()) {
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $category = Category::find($id);
        $category->category_name = $request->input('category_name');
        $category->save();

        return redirect(route('category.index'))->with('toast_success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        // Alert::question('Question Title', 'Question Message');
        alert()->question('Title','Lorem Lorem Lorem');

        $category->delete();
        return redirect(route('category.index'))->with('toast_success', 'Category removed successfully');
    }
}
