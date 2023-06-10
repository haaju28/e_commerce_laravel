<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';

    protected $fillable = [
        'product_id',
        'user_id',
    ];

    public function product_wishlist()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user_wishlist()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function addProductToWishlist($id){

        $user = Auth::user()->id;
        $withlists = Wishlist::create([
            'product_id' => $id,
            'user_id' => $user,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return $withlists;

    }

    public function removeProductToWishlist($id){
        $user = Auth::user()->id;
        $wishlist = Wishlist::where('product_id', $id)
        ->where('user_id', $user)
        ->first();

        if ($wishlist) {
            $wishlist->delete();
            return $wishlist;
        }
    
        return null;
    }

    public function getAll()
    {
        $products = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', '=', 'products.id')
            ->join('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
            ->select('wishlists.*','products.*', 'product_categories.name AS product_category_name')
            ->where('wishlists.user_id', '=', Auth::user()->id)
            ->paginate(8);
    
        return $products;
    }
}
