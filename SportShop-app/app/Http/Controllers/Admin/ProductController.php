<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\ProductImage;
use App\Models\Size;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $productModel;
    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }
    public function getSlug(Request $request){
        $slug = SlugService::createSlug(Product::class, 'slug', $request->name);
        return response()->json(['slug'=>$slug]);
    }
    public function index()
    {
        $products = $this->productModel->getAll();
        return view('admin.pages.products.home',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategories::all();
        $colors = Color::where('status','1')->get();
        $sizes = Size::where('status','1')->get();
        return view('admin.pages.products.add', compact('productCategories','colors','sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $bool=$this->productModel->add($request);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('product.index')->with('message',$message);
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
        $products = $this->productModel->getById($id);
        $categories = ProductCategories::all();
        $colors = $this->productModel->getAllWithColor($id);
        $sizes = $this->productModel->getAllWithSize($id);
        return view('admin.pages.products.detail',['products'=>$products, 'categories'=>$categories, 'colors'=>$colors,'sizes'=>$sizes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCreateRequest $request, $id)
    {
        $bool=$this->productModel->updateById($request,$id);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('product.index')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = $this->productModel->deleteById($id);
        $message='Fail';
        if($products){
            $message='Successful';
        }
        return redirect()->route('product.index')->with('message',$message);
    }
    
    public function destroyImage($id){
        $products = $this->productModel->destroyImageById($id);
        $message='Fail';
        if($products){
            $message='Successful';
        }
        return redirect()->back()->with('message',$message);
    }

    public function destroyColor($id){
        $products = $this->productModel->destroyColorById($id);
        $message='Fail';
        if($products){
            $message='Successful';
        }
        return redirect()->back()->with('message',$message);
    }
    public function destroySize($id){
        $products = $this->productModel->destroySizeById($id);
        $message='Fail';
        if($products){
            $message='Successful';
        }
        return redirect()->back()->with('message',$message);
    }
}
