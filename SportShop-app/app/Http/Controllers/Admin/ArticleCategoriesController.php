<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Models\ArticleCategories;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ArticleCategoriesController extends Controller
{
    private $articleCategoryModel;
    public function __construct(ArticleCategories $articleCategoryModel)
    {
        $this->articleCategoryModel = $articleCategoryModel;
    }
    public function getSlug(Request $request){
        $slug = SlugService::createSlug(ArticleCategories::class, 'slug', $request->name);
        return response()->json(['slug'=>$slug]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleCategories = $this->articleCategoryModel->getAll();
        return view('admin.pages.article_categories.home',['articleCategories'=>$articleCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.article_categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $bool=$this->articleCategoryModel->add($request);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('article-category.index')->with('message',$message);
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
        $articleCategories = $this->articleCategoryModel->getById($id);
        return view('admin.pages.article_categories.detail',['articleCategories'=>$articleCategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryCreateRequest $request, $id)
    {
        $bool=$this->articleCategoryModel->updateById($request,$id);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('article-category.index')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articleCategories = $this->articleCategoryModel->deleteById($id);
        $message='Fail';
        if($articleCategories){
            $message='Successful';
        }
        return redirect()->route('article-category.index')->with('message',$message);
    }

    public function restore($id)
    {
        $articleCategories = $this->articleCategoryModel->restoreById($id);
        $message='Fail';
        if($articleCategories){
            $message='Successful';
        }
        return redirect()->route('article-category.index')->with('message',$message);
    }
}
