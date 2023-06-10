<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart') ?? [];
        return view('client.pages.cart', compact('cart'));
    }

    public function addProductToCart($id, $qty = 1, $color=null, $size=null)
    {
        $product = Product::find($id);
        $colorPro = Color::find($color);
        $sizePro = Size::find($size);
        $cart = session()->get('cart') ?? [];

        $key = $this->generateCartKey($id, $color, $size);

        $colorName = $colorPro ? $colorPro->name : null;
        $sizeName = $sizePro ? $sizePro->name : null;

        //Add product
        $cart[$key]['product_id'] = $id;
        $cart[$key]['qty'] = ($cart[$id]['qty'] ?? 0) + $qty;
        $cart[$key]['price'] = $product->price;
        $cart[$key]['name'] = $product->name;
        $cart[$key]['image'] = $product->image_url;
        $cart[$key]['color'] = $colorName;
        $cart[$key]['color_id'] = $color;
        $cart[$key]['size'] = $sizeName;
        $cart[$key]['size_id'] = $size;
        $cart[$key]['id'] = $id;
        $cart[$key]['product_stock'] = $product->qty;

        session()->put('cart', $cart);
        $totalCart = $this->totalCart($cart);
        $totalProducts = count($cart);
        session()->put('total_cart', $totalCart);
        session()->put('total_products', $totalProducts);
        return response()->json(['id' => $id, 'total_cart' => $totalCart, 'total_products' => $totalProducts]);
    }

    private function generateCartKey($productId, $color, $size)
    {
        $color = $color ?: 'default';
        $size = $size ?: 'default';
        return "$productId-$color-$size";
    }

    public function deleteProductInCart($id)
    {
        $cart = session()->get('cart') ?? [];
        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            $totalCart = $this->totalCart($cart);
            session()->put('total_cart', $totalCart);
        }
        return response()->json(['id' => $id, 'total_cart' => $totalCart]);
    }

    public function totalCart(array $cart): string
    {
        $total = 0;
        if (count($cart) > 0) {
            foreach ($cart as $item) {
                $total += $item['price'] * $item['qty'];
            }
        }
        return number_format($total, 2);
    }

    public function deleteAllItems()
    {
        session()->put('cart', []);
        session()->put('total_cart', number_format(0, 2));
        return redirect()->route('cart.cart');
    }

    public function updateProductInCart($id, $qty)
    {
        $cart = session()->get('cart') ?? [];
        $productStock = Product::find($id);
        if (array_key_exists($id, $cart)) {
            if ($qty == 0) {
                unset($cart[$id]);
            } else {
                $cart[$id]['qty'] = $qty;
            }

            session()->put('cart', $cart);
            $totalCart = $this->totalCart($cart);
            session()->put('total_cart', $totalCart);
        }

        return response()->json(['id' => $id]);
    }
}
