<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Wishlist;
use Auth;
use Spatie\QueryBuilder\QueryBuilder;
use DB;
use Spatie\QueryBuilder\AllowedFilter;

class PageController extends Controller
{


    public function index() {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $subcategories = Subcategory::where('status', 1)->get();

        $wishlist_count = 0;
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }
        $phones = Product::where('products.status', 1)
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('category_name', 'Phone')
            ->select('products.*')
            ->limit(8)
            ->get();
        $laptops = Product::where('products.status', 1)
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('category_name', 'Laptop')
            ->select('products.*')
            ->limit(8)
            ->get();
        $tablets = Product::where('products.status', 1)
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('category_name', 'Tablet')
            ->select('products.*')
            ->limit(8)
            ->get();
        $currentURL = url()->current();
        return view('home', compact(
            'categories',
            'brands',
            'subcategories',
            'wishlist_count',
            'phones',
            'laptops',
            'tablets',
            'currentURL'
        ));
    }

    // Show all Products
    public function showProducts(Request $request) {
        $limit = $request->get('limit') ?? 10;
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $subcategories = Subcategory::where('status', 1)->get();

        $brandHaveProducts = Product::groupBy('brand_id')
            ->where('status', 1)
            ->select('brand_id')
            ->get();
        $subcategoryHaveProducts = Product::groupBy('subcategory_id')
            ->where('status', 1)
            ->select('subcategory_id')
            ->get();
        $colors = Product::groupBy('product_color')
            ->where('status', 1)
            ->select('product_color')
            ->get();
        $sizes = Product::groupBy('product_size')
            ->where('status', 1)
            ->select('product_size')
            ->get();

        $products = QueryBuilder::for(Product::class)
            ->where('status', 1)
            ->allowedSorts(['created_at', 'product_name', 'discount_price'])
            ->allowedFilters([
                'product_name',
                'discount_price',
                'product_color',
                'product_size',
                'brand_id',
                'subcategory_id',
            ])
            ->paginate($limit)
            ->appends(request()->query());

        $wishlists = Wishlist::all();
        $wishlist_count = 0;
        $currentURL = url()->current();
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }

        return view('pages.products', compact(
            'products',
            'categories',
            'brands',
            'subcategories',
            'wishlists',
            'wishlist_count',
            'currentURL',
            'colors',
            'sizes',
            'brandHaveProducts',
            'subcategoryHaveProducts',
        ));
    }

    public function showProductDetail($id) {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $wishlists = Wishlist::all();
        $product = Product::find($id);
        $product_colors = explode(',', $product->product_color);
        $product_sizes = explode(',', $product->product_size);
        $wishlist_count = 0;
        $currentURL = url()->current();
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }
        return view('pages.productDetail', compact(
            'product',
            'product_colors',
            'product_sizes',
            'categories',
            'brands',
            'subcategories',
            'wishlists',
            'wishlist_count',
            'currentURL'
        ));
    }

    public function showContact() {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $wishlist_count = 0;
        $currentURL = url()->current();
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }
        return view('pages.contact', compact(
            'categories',
            'brands',
            'subcategories',
            'wishlist_count',
            'currentURL'
        ));
    }

    // Show products by Subcategories
    public function showProductBySubcategory($subcategory_id, Request $request) {
        $limit = $request->get('limit') ?? 10;
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $subcategories = Subcategory::where('status', 1)->get();

        $brandHaveProducts = Product::where('subcategory_id', $subcategory_id)
            ->groupBy('brand_id')
            ->where('status', 1)
            ->select('brand_id')
            ->get();
        $subcategoryHaveProducts = Product::where('subcategory_id', $subcategory_id)
            ->groupBy('subcategory_id')
            ->where('status', 1)
            ->select('subcategory_id')
            ->get();
        $colors = Product::groupBy('product_color')
            ->where('status', 1)
            ->select('product_color')
            ->get();
        $sizes = Product::groupBy('product_size')
            ->where('status', 1)
            ->select('product_size')
            ->get();

        $products = QueryBuilder::for(Product::class)
            ->where('subcategory_id', $subcategory_id)
            ->where('status', 1)
            ->allowedSorts(['created_at', 'product_name', 'discount_price'])
            ->allowedFilters(['product_name', 'discount_price', 'product_color', 'product_size', 'brand_id', 'subcategory_id'])
            ->paginate($limit)
            ->appends(request()->query());

        $wishlist_count = 0;
        $currentURL = url()->current();
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }
        return view('pages.products', compact(
            'products',
            'categories',
            'brands',
            'subcategories',
            'wishlist_count',
            'currentURL',
            'colors',
            'sizes',
            'brandHaveProducts',
            'subcategoryHaveProducts',
        ));
    }

    // Show Products by Categories
    public function showProductByCategory($category_id, Request $request) {
        $limit = $request->get('limit') ?? 10;
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $subcategories = Subcategory::where('status', 1)->get();

        $brandHaveProducts = Product::where('category_id', $category_id)
            ->groupBy('brand_id')
            ->where('status', 1)
            ->select('brand_id')
            ->get();
        $subcategoryHaveProducts = Product::where('category_id', $category_id)
            ->groupBy('subcategory_id')
            ->where('status', 1)
            ->select('subcategory_id')
            ->get();
        $colors = Product::groupBy('product_color')
            ->where('status', 1)
            ->select('product_color')
            ->get();
        $sizes = Product::groupBy('product_size')
            ->where('status', 1)
            ->select('product_size')
            ->get();

        $products = QueryBuilder::for(Product::class)
            ->where('category_id', $category_id)
            ->where('status', 1)
            ->allowedSorts(['created_at', 'product_name', 'discount_price'])
            ->allowedFilters(['product_name', 'discount_price', 'product_color', 'product_size', 'brand_id', 'subcategory_id'])
            ->paginate($limit)
            ->appends(request()->query());
        $wishlist_count = 0;
        $currentURL = url()->current();
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }
        return view('pages.products', compact(
            'products',
            'categories',
            'brands',
            'subcategories',
            'wishlist_count',
            'currentURL',
            'colors',
            'sizes',
            'brandHaveProducts',
            'subcategoryHaveProducts',
        ));
    }

    // Live Search using Ajax
    public function searchajax(Request $request)
    {
        $searchkey = $request->input('searchkey');
        $products = Product::where('status', 1)
            ->where('product_name', 'like', "%$searchkey%")
            ->get();
        return view('pages.resultSearchAjax', compact('products'));
    }

    // Search
    public function search(Request $request)
    {
        $searchkey = $request->input('searchkey');
        $limit = $request->get('limit') ?? 10;

        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();

        $productColorsWithAmount = Product::groupBy('product_color')
            ->where('status', 1)
            ->select('product_color', DB::raw('count(*) as total'))
            ->get();
        $productSizesWithAmount = Product::groupBy('product_size')
            ->where('status', 1)
            ->select('product_size', DB::raw('count(*) as total'))
            ->get();
        $subcategoriesWithAmount = Product::groupBy('subcategory_id')
            ->where('status', 1)
            ->select('subcategory_id', DB::raw('count(*) as total'))
            ->get();
        $brandsWithAmount = Product::groupBy('brand_id')
            ->where('status', 1)
            ->select('brand_id', DB::raw('count(*) as total'))
            ->get();
        $product_colors = [];
        $product_sizes = [];
        $product_subcategories = [];
        $product_brands = [];
        foreach($productColorsWithAmount as $item) {
            $product_colors[] = $item->product_color;
        }
        foreach($productColorsWithAmount as $item) {
            $product_sizes[] = $item->product_size;
        }
        foreach($subcategoriesWithAmount as $item) {
            $product_subcategories[] = $item->subcategory_id;
        }
        foreach($brandsWithAmount as $item) {
            $product_brands[] = $item->brand_id;
        }

        $products = QueryBuilder::for(Product::class)
        ->where('product_name', 'like', "%$searchkey%")
        ->where('status', 1)
        ->allowedSorts(['created_at', 'product_name', 'discount_price'])
        ->allowedFilters(['product_name', 'discount_price', 'product_color', 'product_size', 'brand_id', 'subcategory_id'])
        ->paginate($limit)
        ->appends(request()->query());

        $wishlists = Wishlist::all();
        $wishlist_count = 0;
        $currentURL = url()->current();
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlist_count = Wishlist::where('user_id', $user_id)->count();
        }
        return view('pages.products', compact(
            'products',
            'categories',
            'brands',
            'subcategories',
            'wishlists',
            'wishlist_count',
            'currentURL',
            'productColorsWithAmount',
            'productSizesWithAmount',
            'subcategoriesWithAmount',
            'brandsWithAmount',
            'product_colors',
            'product_sizes',
            'product_subcategories',
            'product_brands',
        ));
    }
}
