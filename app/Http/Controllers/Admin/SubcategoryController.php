<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Product;


class SubcategoryController extends Controller
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
        $subcategories = Subcategory::orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        return view('admin.subcategories.index', compact('subcategories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategories.create', compact('categories'));
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
            'subcategory_name' => 'required|unique:subcategories|max:255'
        ]);

        $subcategory = new Subcategory;
        $subcategory->subcategory_name = $request->input('subcategory_name');
        $subcategory->category_id = $request->input('category_id');
        $subcategory->save();

        return redirect(route('subcategories.index'))->with('success', 'Subcategory created successfully');
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
        $subcategory = Subcategory::find($id);
        $categories = Category::all();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
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
        $this->validate($request, [
            'subcategory_name' => "required|max:255|unique:App\Models\Subcategory,subcategory_name,{$id}"
        ]);

        $subcategory = Subcategory::find($id);
        $subcategory->subcategory_name = $request->input('subcategory_name');
        $subcategory->category_id = request('category_id');
        $subcategory->save();

        return redirect(route('subcategories.index'))->with('success', 'Subcategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        $products = Product::where('subcategory_id', $id)->get();
        if(count($products) > 0) {
            return redirect(route('subcategories.index'))->with('error', 'Removed products belong to this subcategory first');
        } else {
            $subcategory->delete();
            return redirect(route('subcategories.index'))->with('success', 'Subcategory removed successfully');
        }
    }
}
