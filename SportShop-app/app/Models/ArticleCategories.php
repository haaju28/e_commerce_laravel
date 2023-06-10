<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleCategories extends Model
{
    use HasFactory,SoftDeletes,Sluggable;

    protected $table = 'article_categories';
    protected $fillable = [
        'name', 'created_at', 'updated_at', 'deleted_at', 'slug', 'is_show'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'article_category_id');
    }

    public function add($request){
        $articleCategories = ArticleCategories::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'is_show' => $request->is_show,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return $articleCategories;
    }

    public function updateById($request,$id){
        $articleCategories = ArticleCategories::find($id);
        $articleCategories->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'is_show' => $request->is_show,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return $articleCategories;
    }


    public function getAll(){
        return ArticleCategories::withTrashed()->get();
    }

    public function getById($id){
        return ArticleCategories::find($id);
    }

    public function deleteById($id)
    {
        $articleCategories = ArticleCategories::find($id);
        $articleCategories->delete();
        return $articleCategories;
    }

    public function restoreById($id){
        $articleCategories = ArticleCategories::withTrashed()->find($id)->restore();
        return $articleCategories;
    }
}
