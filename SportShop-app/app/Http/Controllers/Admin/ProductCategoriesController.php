<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorCreateRequest;
use App\Http\Requests\ProductCategoriesCreateRequest;
use App\Models\ProductCategories;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProductCategoriesController extends Controller
{
    private $categoryModel;
    public function __construct(ProductCategories $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }
    public function getSlug(Request $request){
        $slug = SlugService::createSlug(ProductCategories::class, 'slug', $request->name);
        return response()->json(['slug'=>$slug]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = $this->categoryModel->getAll();
        return view('admin.pages.product_categories.home',['productCategories'=>$productCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.product_categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoriesCreateRequest $request)
    {
        $bool=$this->categoryModel->add($request);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('product-category.index')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCategories = $this->categoryModel->getById($id);
        return view('admin.pages.product_categories.detail',['productCategories'=>$productCategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoriesCreateRequest $request, $id)
    {
        $bool=$this->categoryModel->updateById($request,$id);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('product-category.index')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productCategories = $this->categoryModel->deleteById($id);
        $message='Fail';
        if($productCategories){
            $message='Successful';
        }
        return redirect()->route('product-category.index')->with('message',$message);
    }

    public function restore($id)
    {
        $productCategories = $this->categoryModel->restoreById($id);
        $message='Fail';
        if($productCategories){
            $message='Successful';
        }
        return redirect()->route('product-category.index')->with('message',$message);
    }
}
