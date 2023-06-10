<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;

class Product extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'products';
    protected $fillable = [
        'product_categories_id',
        'name',
        'image_url',
        'short_description',
        'description',
        'price',
        'discount_price',
        'qty',
        'weight',
        'dimensions',
        'materials',
        'image_url',
        'status',
        'slug',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function category()
    {
        return $this->belongsTo(ProductCategories::class, 'product_categories_id')->withTrashed();
    }

    public function image_product()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function colors_product()
    {
        return $this->hasMany(ProductColor::class, 'product_id' ,'id');
    }

    public function sizes_product()
    {
        return $this->hasMany(ProductSize::class, 'product_id' ,'id');
    }

    public function wishlist_product()
    {
        return $this->hasMany(Wishlist::class, 'product_id');
    }

    public function add($request)
    {
        $imageName = null;
        if ($request->image_url) {
            $imageName = uniqid() . '_' . $request->image_url->getClientOriginalName();
            $request->image_url->move(public_path('images'), $imageName);
        }

        $products = Product::create([
            'name' => $request->name,
            'image_url' => $imageName,
            'slug' => $request->slug,
            'created_at' => date('Y-m-d H:i:s'),
            'product_categories_id' => $request->product_categories_id,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'qty' => $request->qty,
            'weight' => $request->weight,
            'dimensions' => $request->dimensions,
            'materials' => $request->materials,
            'status' => $request->status,
        ]);


        if ($request->hasFile('image')) {
            $uploadPath = public_path('images');

            foreach ($request->file('image') as $imageFile) {
                $fileName = uniqid() . '_' . $imageFile->getClientOriginalName();
                $imageFile->move($uploadPath, $fileName);

                $products->image_product()->create([
                    'product_id' => $products->id,
                    'image' => $fileName,
                ]);
            }
        }

        if($request->colors){
            foreach($request->colors as $key => $color){
                $products->colors_product()->create([
                    'product_id' => $products->id,
                    'color_id' => $color,
                ]);
            }
        }

        if($request->sizes){
            foreach($request->sizes as $key => $size){
                $products->sizes_product()->create([
                    'product_id' => $products->id,
                    'size_id' => $size,
                ]);
            }
        }

        return $products;
    }

    public function updateById($request, $id)
    {
        $products = Product::find($id);
        if ($products) {
            $oldImage = $products->image_url;
            $imageName = $oldImage;

            if ($request->image_url) {
                $imageName = uniqid() . '_' . $request->image_url->getClientOriginalName();
                $request->image_url->move(public_path('images'), $imageName);
                if (!is_null($oldImage) && file_exists("images/" . $oldImage)) {
                    unlink("images/" . $oldImage);
                }
            }

            $updateData = [
                'name' => $request->name,
                'slug' => $request->slug,
                'updated_at' => date('Y-m-d H:i:s'),
                'product_categories_id' => $request->product_categories_id,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'qty' => $request->qty,
                'weight' => $request->weight,
                'dimensions' => $request->dimensions,
                'materials' => $request->materials,
                'status' => $request->status,
            ];

            if (!is_null($imageName)) {
                $updateData['image_url'] = $imageName;
            }

            $products->update($updateData);
        }

        if ($request->hasFile('image')) {
            $uploadPath = public_path('images');

            foreach ($request->file('image') as $imageFile) {
                $fileName = uniqid() . '_' . $imageFile->getClientOriginalName();
                $imageFile->move($uploadPath, $fileName);

                $products->image_product()->create([
                    'product_id' => $products->id,
                    'image' => $fileName,
                ]);
            }
        }

        if($request->colors){
            foreach($request->colors as $key => $color){
                $products->colors_product()->create([
                    'product_id' => $products->id,
                    'color_id' => $color,
                ]);
            }
        }

        if($request->sizes){
            foreach($request->sizes as $key => $size){
                $products->sizes_product()->create([
                    'product_id' => $products->id,
                    'size_id' => $size,
                ]);
            }
        }

        return $products;
    }


    public function getAll()
    {
        $products = DB::table('products')
        ->join('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
        ->select('products.*', 'product_categories.name as product_category_name')
        ->orderBy('products.created_at', 'desc')
        ->get();
        return $products;
    }

    public function getProductsPaginate(){

        $products = DB::table('products')->join('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
        ->select('products.*', 'product_categories.name as product_category_name')
        ->paginate(8);
        return $products;
    }

    public function showListProducts(){
        $products = DB::table('products')
        ->join('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
        ->select('products.*', 'product_categories.name as product_category_name')->limit(10)
        ->get();
        return $products;
    }

    public function getAllWithColor($id){
        $product = Product::find($id);
        $product_color = $product->colors_product->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id',$product_color)->get();
        return $colors;
    }

    public function getAllWithSize($id){
        $product = Product::find($id);
        $product_size = $product->sizes_product->pluck('size_id')->toArray();
        $sizes = Size::whereNotIn('id',$product_size)->get();
        return $sizes;
    }

    public function getById($id)
    {
        return Product::find($id);
    }

    public function deleteById($id)
    {
        $products = Product::find($id);
        if($products->image_product){
            foreach($products->image_product as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $products->delete();
        return $products;
    }

    public function destroyImageById(int $id){
        $productImage = ProductImage::find($id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return $productImage;
    }

    public function destroyColorById(int $id){
        $productColor = ProductColor::find($id);
        $productColor->delete();
        return $productColor;
    }

    public function destroySizeById(int $id){
        $productSize = ProductSize::find($id);
        $productSize->delete();
        return $productSize;
    }

    public function getNewProduct(){
        $products = Product::orderBy('created_at', 'desc')->limit(10)->get();
        return $products;
    }

    public function getDetailProductBySlug($slug){
        $products = Product::where('slug', $slug)->first();
        return $products;
    }

    public function getRelatedProductByCategory($slug){
        $products = Product::where('slug', $slug)->first();
        $relatedCategory = $products->category ;
        $productRelated = Product::where('product_categories_id', $relatedCategory->id)
        ->where('id', '!=', $products->id)
        ->get();
        return $productRelated;
    }


}
