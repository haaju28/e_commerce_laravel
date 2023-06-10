<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $bannerModel, $productModel, $proCteModel, $blogModel, $colorModel;
    public function __construct(Banner $bannerModel, 
    Product $productModel, 
    ProductCategories $proCteModel, 
    Blog $blogModel, 
    Color $colorModel)

    {
        $this->bannerModel = $bannerModel;
        $this->productModel = $productModel;
        $this->proCteModel = $proCteModel;
        $this->blogModel = $blogModel;
        $this->colorModel = $colorModel;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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



        $banners = $this->bannerModel->getAll();
        $newProducts = $this->productModel->getNewProduct();
        $productCategories = $this->proCteModel->getAll();
        $blogs = $this->blogModel->getNewBlogs();
        $colors = $this->colorModel->getAll();
        return view('client.pages.home',compact('banners','newProducts','productCategories','products','blogs','colors','sortBy', 'sortType'));
    }

    public function getDetailBySlug($slug){
	    $product = $this->productModel->getDetailProductBySlug($slug);
        $relatedProducts = $this->productModel->getRelatedProductByCategory($slug);
        return view('client.pages.product_detail',compact('product','relatedProducts'));
    }

    public function showLogin(){
        $banners = $this->bannerModel->getAll();
        return view('auth.login', compact('banners'));
    }
}
