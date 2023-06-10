<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ProductCategories extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = 'product_categories';
    
    protected $fillable = [
        'name', 'trend','created_at', 'updated_at', 'deleted_at', 'slug', 'is_show'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'product_categories_id');
    }


    public function add($request){
        $productCategories = ProductCategories::create([
            'name' => $request->name,
            'trend' => $request->trend,
            'slug' => $request->slug,
            'is_show' => $request->is_show,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return $productCategories;
    }

    public function updateById($request,$id){
        $productCategories = ProductCategories::find($id);
        $productCategories->update([
            'name' => $request->name,
            'trend' => $request->trend,
            'slug' => $request->slug,
            'is_show' => $request->is_show,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return $productCategories;
    }


    public function getAll(){
        return ProductCategories::withTrashed()->get();
    }

    public function getById($id){
        return ProductCategories::find($id);
    }

    public function deleteById($id)
    {
        $productCategories = ProductCategories::find($id);
        $productCategories->delete();
        return $productCategories;
    }

    public function restoreById($id){
        $productCategories = ProductCategories::withTrashed()->find($id)->restore();
        return $productCategories;
    }
}
