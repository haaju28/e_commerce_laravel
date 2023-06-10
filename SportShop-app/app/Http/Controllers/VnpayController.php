<?php

namespace App\Http\Controllers;

use App\Events\OrderSuccessEvent;
use App\Models\Order;
use Illuminate\Http\Request;

class VnpayController extends Controller
{
    // private $smsService;
    // public function __construct(SmsService $smsService){
    //     $this->smsService = $smsService;
    // }
    
    public function callbackVnpay(Request $request){
        $orderId = $request->get('vnp_TxnRef');
        $order = Order::find($orderId);

        session()->put('cart', []);

        if($request->get('vnp_ResponseCode') === '00'){
            event(new OrderSuccessEvent($order));
            
            return view('client.pages.order_successful')->with('message', 'Dat hang thanh cong');
        }else{
            //update status order = 'cancel'
            $order->status = 'cancel';
            $order->save();
            //update status order_payment_methods = 'cancel'
            $paymentMethods = $order->order_payment_methods;
            foreach($paymentMethods as $paymentMethod){
                //App\Models\OrderPaymentMethod
                $paymentMethod->status = 'cancel';
                $paymentMethod->save();
            }
            return view('client.pages.order_fail')->with('message', 'Dat hang that bai');
        }
    }
}
