<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategories;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogClientController extends Controller
{
    private $blogModel;

    public function __construct(Blog $blogModel)
    {
        $this->blogModel = $blogModel;
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
        $blogs = DB::table('blogs')->join('article_categories', 'blogs.article_category_id', '=', 'article_categories.id')
        ->select('blogs.*', 'article_categories.name as article_categories_name')
        ->where($filter)->orderBy($sortBy,$sortType)
        ->where('blogs.status', 1)
        ->where('blogs.is_approved', 1)
        ->when($category, function ($query) use ($category) {
            return $query->where('article_categories.name', $category);
        })->paginate(3);
        $blogCategories = ArticleCategories::all();
        return view('client.pages.blog',compact('blogs','blogCategories','sortBy', 'sortType') );
    }

    public function getDetailBySlug($slug){
	    $blog = $this->blogModel->getDetailBlogBySlug($slug);
        $blogCategories = ArticleCategories::all();
        return view('client.pages.blog_detail',compact('blog','blogCategories'));
    }

    public function searchBlog(Request $request)
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

        $blogCategories = ArticleCategories::all();

        $blogs = DB::table('blogs')->join('article_categories', 'blogs.article_category_id', '=', 'article_categories.id')
            ->select('blogs.*', 'article_categories.name as article_categories_name')
            ->where($filter)->orderBy($sortBy,$sortType)
            ->where('blogs.status', 1)
            ->where('blogs.is_approved', 1)
            ->where('blogs.title', 'like', '%' . $get_name . '%')
            ->when($category, function ($query) use ($category) {
                return $query->where('article_categories.name', $category);
            })->paginate(3);



        return view('client.pages.blog', compact('blogs', 'blogCategories', 'sortBy', 'sortType'));
    }
}
