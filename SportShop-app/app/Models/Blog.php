<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use HasFactory,Sluggable;

    protected $table = 'blogs';

    protected $dates = ['published_at'];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'author',
        'image',
        'short_description',
        'status',
        'is_approved',
        'article_category_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function article_category()
    {
        return $this->belongsTo(ArticleCategories::class, 'article_category_id')->withTrashed();
    }


    public function add($request){
        $imageName = null;
        if ($request->image) {
            $imageName = uniqid() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
        }
        $blogs = Blog::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'author' => $request->author,
            'image' => $imageName,
            'short_description' => $request->short_description,
            'status' => $request->status,
            'is_approved' => $request->is_approved,
            'article_category_id' => $request->article_category_id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return $blogs;
    }

    public function updateById($request,$id){
        $blogs = Blog::find($id);
        if ($blogs) {
            $oldImage = $blogs->image;
            $imageName = $oldImage;

            if ($request->image) {
                $imageName = uniqid() . '_' . $request->image->getClientOriginalName();
                $request->image->move(public_path('images'), $imageName);
                if (!is_null($oldImage) && file_exists("images/" . $oldImage)) {
                    unlink("images/" . $oldImage);
                }
            }

            $updateData = [
                'title' => $request->title,
                'slug' => $request->slug,
                'description' => $request->description,
                'author' => $request->author,
                'short_description' => $request->short_description,
                'status' => $request->status,
                'is_approved' => $request->is_approved,
                'article_category_id' => $request->article_category_id,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if (!is_null($imageName)) {
                $updateData['image'] = $imageName;
            }

            $blogs->update($updateData);
        }
        return $blogs;
    }


    public function getAll(){
        $blogs = DB::table('blogs')->join('article_categories', 'blogs.article_category_id', '=', 'article_categories.id')
        ->select('blogs.*', 'article_categories.name as article_categories_name')
        ->where('blogs.status', 1)
        ->where('blogs.is_approved', 1)
        ->paginate(3);
        return $blogs;
    }

    public function getById($id){
        return Blog::find($id);
    }

    public function deleteById($id)
    {
        $blogs = Blog::find($id);
        $blogs->delete();
        return $blogs;
    }

    public function getNewBlogs(){
        $blogs = Blog::orderBy('created_at', 'desc')->limit(3)->get();
        return $blogs;
    }

    public function getDetailBlogBySlug($slug){
        $blog = DB::table('blogs')
        ->join('article_categories', 'blogs.article_category_id', '=', 'article_categories.id')
        ->select('blogs.*', 'article_categories.name as article_category_name')
        ->where('blogs.slug', $slug)
        ->where('blogs.status', 1)
        ->where('blogs.is_approved', 1)
        ->first();
        return $blog;
    }

}
