<?php

namespace App\Http\Controllers\Client;

use App\Events\OrderSuccessEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlaceOrderRequest;
use App\Http\Service\VnpayService;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderPaymentMethod;
use App\Models\User;
use App\Models\WebInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    private $vnpayService,$orderModel;
    public function __construct(VnpayService $vnpayService,Order $orderModel){
        $this->vnpayService = $vnpayService;
        $this->orderModel = $orderModel;
    }

    public function checkout()
    {
        $cart = session()->get('cart') ?? [];

        return view('client.pages.checkout', compact('cart'));
    }

    public function placeOrder(PlaceOrderRequest $request)
    {
        //validate request from user
        $cart = session()->get('cart') ?? [];

        $arrayData = DB::transaction(function () use($request, $cart) {
            //Create records into table Order
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'address' => $request->get('address'),
                'phone' => $request->get('phone'),
                'status' => 'pending',
                'payment_method' => $request->get('payment_method'),
            ]);

            //Create records into table OrderItems
            $totalBalance = 0;
            foreach($cart as $productId => $item) {
                $orderItems = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'color_id' =>$item['color_id'],
                    'size_id' =>$item['size_id'],
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                    'name' => $item['name'],
                ]);
                $totalBalance += $item['qty'] * $item['price'];
            }

            //Create records into table OrderPaymentMethod
            $orderPaymentMethod = OrderPaymentMethod::create([
                'order_id' =>  $order->id,
                'payment_provider' => $request->get('payment_method'),
                'total_balance' => $totalBalance,
                'status' => 'pending',
            ]);

            $user = User::find($order->user_id);
            $user->phone =  $request->get('phone');
            $user->save();

            return compact('order', 'totalBalance', 'orderPaymentMethod');
        });

        $paymentMethod = $request->get('payment_method');
        if(in_array($paymentMethod, ['vnpay_atm', 'vnpay_creditcart'])){
            $vnp_Url = $this->vnpayService->urlVnPay($arrayData['order'], $arrayData['totalBalance'], $paymentMethod);
            return Redirect::to($vnp_Url);
        }else{
            event(new OrderSuccessEvent($arrayData['order']));
        }

        session()->put('cart', []);

        return view('client.pages.order_successful')->with('message', 'Dat hang thanh cong');
    }

    public function getDetailOrderByCode($id){
        $shortURL = \AshAllenDesign\ShortURL\Models\ShortURL::findByKey($id);

        $destinationUrl = $shortURL->destination_url;
        $params = parse_url($destinationUrl)['path'] ?? [];
        $id = explode('/', $params)[3] ?? null;

        $order = Order::findOrFail($id);

        return view('clients.pages.user_order', ['order' => $order]);
    }

    public function showOrder($id){
        $orders = $this->orderModel->getProductByUserId($id);
        $webInfors = WebInformation::first();
        return view('client.pages.user_order_history', compact('orders','webInfors'));
    }

    public function showDetailOrder($id){
        $orders = $this->orderModel->getById($id);
        $orderItems = $this->orderModel->getProductById($id);
        return view('client.pages.user_order_detail',compact('orders','orderItems'));
    }

    public function cancelBill($id){
        $bool=$this->orderModel->cancelBill($id);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('home')->with('message',$message);
    }
}
