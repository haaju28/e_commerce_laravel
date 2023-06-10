<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        'user_id',
        'address',
        'phone',
        'status',
        'payment_method'
    ];

    public function order_payment_methods()
    {
        return $this->hasMany(OrderPaymentMethod::class, 'order_id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function updateById($request,$id){
    //     $order = Order::findOrFail($id);

    //     $count = DB::table('order_items')
    //     ->selectRaw('SUM(qty) AS count')
    //     ->where('order_id', $id)
    //     ->first();

    //     $count = $count->count;

    //     $order->update([
    //         'status' => $request->status,
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ]);

    //     if ($order->status === 'done') {
    //         $orderItems = OrderItem::where('order_id', $id)->get();

    //         foreach ($orderItems as $orderItem) {
    //             $productId = $orderItem->product_id;
    //             $qty = $orderItem->qty;

    //             // Giảm qty của product tương ứng
    //             Product::where('id', $productId)->decrement('qty', $count);
    //         }
    //     }

    //     return $order;
    // }

    public function updateById($request, $id)
    {
        $order = Order::findOrFail($id);

        $orderItems = OrderItem::select('product_id', DB::raw('SUM(qty) AS count'))
            ->where('order_id', $id)
            ->groupBy('product_id')
            ->get();

        $order->update([
            'status' => $request->status,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if ($order->status === 'done') {
            foreach ($orderItems as $orderItem) {
                $productId = $orderItem->product_id;
                $qty = $orderItem->count;

                // Giảm qty của product tương ứng
                Product::where('id', $productId)->decrement('qty', $qty);
            }
        }

        return $order;
    }


    public function cancelBill($id){
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'cancel',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return $order;
    }


    public function getAll(){
        $results = DB::table('orders')
        ->join('order_payment_methods', 'orders.id', '=', 'order_payment_methods.order_id')
        ->select('orders.*', 'order_payment_methods.total_balance', 'order_payment_methods.payment_provider')
        ->orderByRaw("CASE WHEN orders.status = 'done' THEN 1 ELSE 0 END")
        ->orderBy('created_at', 'desc')
        ->get();

        return $results;
    }

    public function getById($id)
    {
        $results = DB::table('orders')
            ->where('orders.id', $id)
            ->join('order_payment_methods', 'orders.id', '=', 'order_payment_methods.order_id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->select(
                '*',
                'orders.id',
                'orders.status',
                'orders.created_at',
                'order_payment_methods.total_balance',
                'order_payment_methods.payment_provider',
                'users.name',
                'users.address',

            )
            ->first();

        return $results;
    }

    public function getProductById($id)
    {
        $results = DB::table('order_items')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->join('colors', 'order_items.color_id', '=', 'colors.id')
        ->join('sizes', 'order_items.size_id', '=', 'sizes.id')
        ->select(
            'products.name as proName',
            'products.image_url as proImage',
            'sizes.name as proSize',
            'colors.name as proColor',
            'order_items.price as price',
            'order_items.qty as quantity',
        )
        ->where('order_items.order_id', $id)
        ->get();

        return $results;
    }

    public function getProductByUserId($id){

        $results = DB::table('orders')
            ->join('order_payment_methods', 'orders.id', '=', 'order_payment_methods.order_id')
            ->select('orders.*','order_payment_methods.total_balance', 'order_payment_methods.payment_provider')
            ->where('orders.user_id', $id)
            ->orderByRaw("CASE WHEN orders.status = 'done' THEN 1 ELSE 0 END")
            ->orderBy('created_at', 'desc')
            ->get();

        return $results;
    }

}
