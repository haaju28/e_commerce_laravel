<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCreateRequest;
use App\Models\ArticleCategories;
use App\Models\Blog;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogModel;
    public function __construct(Blog $blogModel)
    {
        $this->blogModel = $blogModel;
    }
    public function getSlug(Request $request){
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blogModel->getAll();
        return view('admin.pages.blogs.home',['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articleCategories = ArticleCategories::all();
        return view('admin.pages.blogs.add', compact('articleCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCreateRequest $request)
    {
        $bool=$this->blogModel->add($request);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('blog.index')->with('message',$message);
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
        $blogs = $this->blogModel->getById($id);
        $categories = ArticleCategories::all();
        return view('admin.pages.blogs.detail',['blogs'=>$blogs, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCreateRequest $request, $id)
    {
        $bool=$this->blogModel->updateById($request,$id);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('blog.index')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs = $this->blogModel->deleteById($id);
        $message='Fail';
        if($blogs){
            $message='Successful';
        }
        return redirect()->route('blog.index')->with('message',$message);
    }
}
