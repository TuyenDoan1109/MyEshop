<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Brand;
use App\Models\Product;

class BrandController extends Controller
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
        $brands = Brand::orderBy('created_at', 'desc')->get();
        return view('admin.brands.index')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'brand_name' => 'required|unique:brands|max:255',
            'brand_logo' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('brand_logo')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('brand_logo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('brand_logo')->getClientOriginalExtension();
            // Filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('brand_logo')->storeAs('public/backend/img', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        $brand = new Brand;
        $brand->brand_name = $request->input('brand_name');
        $brand->brand_logo = $filenameToStore;
        $brand->save();

        return redirect(route('brands.index'))->with('success', 'Brand Created Successfully');
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
        $brand = Brand::find($id);
        return view('admin.brands.edit')->with('brand', $brand);
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
            'brand_name' => "required|unique:App\Models\Brand,brand_name,{$id}|max:255",
            'brand_logo' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('brand_logo')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('brand_logo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('brand_logo')->getClientOriginalExtension();
            // Filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('brand_logo')->storeAs('public/backend/img', $filenameToStore);
        }

        $brand = Brand::find($id);
        $brand->brand_name = $request->input('brand_name');
        if($request->hasFile('brand_logo')) {
            // Delete old image
            Storage::delete('public/backend/img/' . $brand->brand_logo);
            $brand->brand_logo = $filenameToStore;
        }
        $brand->save();

        return redirect(route('brands.index'))->with('success', 'Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        $products = Product::where('brand_id', $id)->get();
        if(count($products) > 0) {
            return redirect(route('brands.index'))->with('error', 'Removed products belong to this brand first');
        } else {
            if($brand->brand_logo != 'noimage.jpg') {
                // Delete image
                Storage::delete('public/backend/img/' . $brand->brand_logo);
            }
            $brand->delete();
            return redirect(route('brands.index'))->with('success', 'Brand Deleted Successfully');
        }
    }
}
