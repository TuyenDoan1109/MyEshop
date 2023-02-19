<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
    public function index(Request $request)
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function getSubcategory(Request $request) {
        $category_id = $request->category_id;
        $subcategories = Subcategory::where('category_id', $category_id)->get();
        $html = '<option value="">Select Subcategory</option>';
        foreach($subcategories as $subcategory) {
            $html .= '<option value="'. $subcategory->id .'">' . $subcategory->subcategory_name . '</option>';
        }
        return $html;
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
            'product_name' => 'required|unique:products',
            'product_code' => 'required|unique:products',
            'selling_price' => 'required|integer',
            'discount_price' => 'required|integer',
            'product_quantity' => 'required|integer',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'product_size' => 'required',
            'product_color' => 'required',
            'video_link' => 'required',
            'image_1' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1999',
            'image_2' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1999',
            'image_3' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1999',
            'product_detail' => 'required',
        ]);

        // Handle File Upload
        if($request->hasFile('image_1')) {
            // Get filename with the extension
            $filenameWithExt1 = $request->file('image_1')->getClientOriginalName();
            // Get just filename
            $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);
            // Get just ext
            $extension1 = $request->file('image_1')->getClientOriginalExtension();
            // Filename to store
            $filenameToStore1 = $filename1 . '_' . time() . '.' . $extension1;
            // Upload image
            $path1 = $request->file('image_1')->storeAs('public/backend/img', $filenameToStore1);
        } else {
            $filenameToStore1 = 'noimage.jpg';
        }

        if($request->hasFile('image_2')) {
            $filenameWithExt2 = $request->file('image_2')->getClientOriginalName();
            $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
            $extension2 = $request->file('image_2')->getClientOriginalExtension();
            $filenameToStore2 = $filename2 . '_' . time() . '.' . $extension2;
            $path2 = $request->file('image_2')->storeAs('public/backend/img', $filenameToStore2);
        } else {
            $filenameToStore2 = 'noimage.jpg';
        }

        if($request->hasFile('image_3')) {
            $filenameWithExt3 = $request->file('image_3')->getClientOriginalName();
            $filename3 = pathinfo($filenameWithExt3, PATHINFO_FILENAME);
            $extension3 = $request->file('image_3')->getClientOriginalExtension();
            $filenameToStore3 = $filename3 . '_' . time() . '.' . $extension3;
            $path3 = $request->file('image_3')->storeAs('public/backend/img', $filenameToStore3);
        } else {
            $filenameToStore3 = 'noimage.jpg';
        }

        // Create Product
        $product = new Product;

        $product->product_name = $request->input('product_name');
        $product->product_code = $request->input('product_code');
        $product->selling_price = $request->input('selling_price');
        $product->discount_price = $request->input('discount_price');
        $product->product_quantity = $request->input('product_quantity');
        $product->category_id = $request->input('category_id');
        $product->subcategory_id = $request->input('subcategory_id');
        $product->brand_id = $request->input('brand_id');
        $product->product_size = $request->input('product_size');
        $product->product_color = $request->input('product_color');
        $product->video_link = $request->input('video_link');
        $product->image_1 = $filenameToStore1;
        $product->image_2 = $filenameToStore2;
        $product->image_3 = $filenameToStore3;
        $product->product_detail = $request->input('product_detail');

        if($request->input('main_slider')) {
            $product->main_slider = $request->input('main_slider');
        } else {
            $product->main_slider = 0;
        }

        if($request->input('hot_deal')) {
            $product->hot_deal = $request->input('hot_deal');
        } else {
            $product->hot_deal = 0;
        }

        if($request->input('best_rated')) {
            $product->best_rated = $request->input('best_rated');
        } else {
            $product->best_rated = 0;
        }

        if($request->input('mid_slider')) {
            $product->mid_slider = $request->input('mid_slider');
        } else {
            $product->mid_slider = 0;
        }

        if($request->input('trend')) {
            $product->trend = $request->input('trend');
        } else {
            $product->trend = 0;
        }

        if($request->input('hot_new')) {
            $product->hot_new = $request->input('hot_new');
        } else {
            $product->hot_new = 0;
        }

        $product->status = 1;

        $product->save();

        return redirect(route('products.index'))->with('success', 'Product created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();
        $subcategories = Subcategory::where('category_id', $product->category_id)->get();
        return view('admin.products.show', compact('product', 'brands', 'categories', 'subcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();
        $subcategories = Subcategory::where('category_id', $product->category_id)->get();
        return view('admin.products.edit', compact('product', 'brands', 'categories', 'subcategories'));
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
        $product = Product::find($id);
        $this->validate($request, [
            'product_name' => 'required',
            'product_code' => 'required',
            'selling_price' => 'required|integer',
            'discount_price' => 'required|integer',
            'product_quantity' => 'required|integer',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'product_size' => 'required',
            'product_color' => 'required',
            'video_link' => 'required',
            'image_1' => 'nullable|image|max:1999',
            'image_2' => 'nullable|image|max:1999',
            'image_3' => 'nullable|image|max:1999',
            'product_detail' => 'required'
        ]);

        // Handle File Upload
        if($request->hasFile('image_1')) {
            // Get filename with the extension
            $filenameWithExt1 = $request->file('image_1')->getClientOriginalName();
            // Get just filename
            $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);
            // Get just ext
            $extension1 = $request->file('image_1')->getClientOriginalExtension();
            // Filename to store
            $filenameToStore1 = $filename1 . '_' . time() . '.' . $extension1;
            // Upload image
            $path1 = $request->file('image_1')->storeAs('public/backend/img', $filenameToStore1);
            if($product->image_1 != 'noimage.jpg') {
                // Delete image 1
                Storage::delete('public/backend/img/' . $product->image_1);
            }
        }

        if($request->hasFile('image_2')) {
            $filenameWithExt2 = $request->file('image_2')->getClientOriginalName();
            $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
            $extension2 = $request->file('image_2')->getClientOriginalExtension();
            $filenameToStore2 = $filename2 . '_' . time() . '.' . $extension2;
            $path2 = $request->file('image_2')->storeAs('public/backend/img', $filenameToStore2);
            if($product->image_2 != 'noimage.jpg') {
                // Delete image 2
                Storage::delete('public/backend/img/' . $product->image_2);
            }
        }

        if($request->hasFile('image_3')) {
            $filenameWithExt3 = $request->file('image_3')->getClientOriginalName();
            $filename3 = pathinfo($filenameWithExt3, PATHINFO_FILENAME);
            $extension3 = $request->file('image_3')->getClientOriginalExtension();
            $filenameToStore3 = $filename3 . '_' . time() . '.' . $extension3;
            $path3 = $request->file('image_3')->storeAs('public/backend/img', $filenameToStore3);
            if($product->image_3 != 'noimage.jpg') {
                // Delete image 3
                Storage::delete('public/backend/img/' . $product->image_3);
            }
        }

        $product->product_name = $request->input('product_name');
        $product->product_code = $request->input('product_code');
        $product->selling_price = $request->input('selling_price');
        $product->discount_price = $request->input('discount_price');
        $product->product_quantity = $request->input('product_quantity');
        $product->category_id = $request->input('category_id');
        $product->subcategory_id = $request->input('subcategory_id');
        $product->brand_id = $request->input('brand_id');
        $product->product_size = $request->input('product_size');
        $product->product_color = $request->input('product_color');
        $product->video_link = $request->input('video_link');

        if($request->hasFile('image_1')) {
            $product->image_1 = $filenameToStore1;
        }
        if($request->hasFile('image_2')) {
            $product->image_2 = $filenameToStore2;
        }
        if($request->hasFile('image_3')) {
            $product->image_3 = $filenameToStore3;
        }
        $product->product_detail = $request->input('product_detail');

        if($request->input('main_slider')) {
            $product->main_slider = $request->input('main_slider');
        } else {
            $product->main_slider = 0;
        }

        if($request->input('hot_deal')) {
            $product->hot_deal = $request->input('hot_deal');
        } else {
            $product->hot_deal = 0;
        }

        if($request->input('best_rated')) {
            $product->best_rated = $request->input('best_rated');
        } else {
            $product->best_rated = 0;
        }

        if($request->input('mid_slider')) {
            $product->mid_slider = $request->input('mid_slider');
        } else {
            $product->mid_slider = 0;
        }

        if($request->input('trend')) {
            $product->trend = $request->input('trend');
        } else {
            $product->trend = 0;
        }

        if($request->input('hot_new')) {
            $product->hot_new = $request->input('hot_new');
        } else {
            $product->hot_new = 0;
        }
        $product->save();

        return redirect(route('products.index'))->with('success', 'Product updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->image_1 != 'noimage.jpg') {
            // Delete image 1
            Storage::delete('public/backend/img/' . $product->image_1);
        }
        if($product->image_2 != 'noimage.jpg') {
            // Delete image 2
            Storage::delete('public/backend/img/' . $product->image_2);
        }
        if($product->image_3 != 'noimage.jpg') {
            // Delete image 3
            Storage::delete('public/backend/img/' . $product->image_3);
        }

        $product->delete();
        return redirect(route('products.index'))->with('success', 'Product removed');
    }

    public function active($id) {
        $product = Product::find($id);
        $product->status = 1;
        $product->save();
        return redirect(route('products.index'))->with('success', 'Product actived');
    }

    public function inactive($id) {
        $product = Product::find($id);
        $product->status = 0;
        $product->save();
        return redirect(route('products.index'))->with('success', 'Product inactived');
    }
}
