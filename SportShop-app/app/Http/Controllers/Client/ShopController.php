<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\ProductColor;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    private $productModel, $proCteModel, $colorModel;
    public function __construct(Product $productModel, ProductCategories $proCteModel, Color $colorModel)
    {
        $this->productModel = $productModel;
        $this->proCteModel = $proCteModel;
        $this->colorModel = $colorModel;
    }

    public function index(Request $request)
    {
        $filter = [];
        $sortBy = $request->input('sort-by') ?? 'created_at';
        $sortType = $request->input('sort-type');
        $sort = ['desc', 'asc'];

        $category = $request->input('category');

        if (!empty($sortType) && in_array($sortType, $sort)) {
            $sortType = $sortType === 'desc' ? 'asc' : 'desc';
        } else {
            $sortType = 'desc';
        }

        $products = DB::table('products')
            ->select('products.*', 'product_categories.name AS product_category_name')
            ->join('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
            ->join('product_colors', 'product_colors.product_id', '=', 'products.id')
            ->join('colors', 'product_colors.color_id', '=', 'colors.id')
            ->groupBy('products.id', 'products.name', 'products.name', 'products.image_url', 'products.short_description', 'products.description', 'products.price', 'products.discount_price', 'products.qty', 'products.weight', 'products.dimensions', 'products.materials', 'products.status', 'products.slug', 'products.created_at', 'products.updated_at', '.products.product_categories_id', 'product_categories.name')
            ->where($filter)->orderBy($sortBy,$sortType)
            ->where('products.status', 1)
            ->when($category, function ($query) use ($category) {
                return $query->where('product_categories.name', $category);
            })
            ->paginate(8);




        $productCategories = $this->proCteModel->getAll();

        $colors = $this->colorModel->getAll();

        return view('client.pages.shop', compact('productCategories', 'products', 'colors', 'sortBy', 'sortType'));
    }

    public function search(Request $request)
    {

        $filter = [];
        $sortBy = $request->input('sort-by') ?? 'created_at';
        $sortType = $request->input('sort-type');
        $sort = ['desc', 'asc'];

        $category = $request->input('category');

        if (!empty($sortType) && in_array($sortType, $sort)) {
            $sortType = $sortType === 'desc' ? 'asc' : 'desc';
        } else {
            $sortType = 'desc';
        }

        $get_name = $request->search;
        $productCategories = $this->proCteModel->getAll();
        $colors = $this->colorModel->getAll();
        $products = DB::table('products')->join('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
            ->select('products.*', 'product_categories.name as product_category_name')
            ->where($filter)->orderBy($sortBy,$sortType)
            ->where('products.status', 1)
            ->where('products.name', 'like', '%' . $get_name . '%')
            ->when($category, function ($query) use ($category) {
                return $query->where('product_categories.name', $category);
            })->paginate(8);
        return view('client.pages.shop', compact('products', 'productCategories', 'colors','sortBy', 'sortType'));
    }


}
