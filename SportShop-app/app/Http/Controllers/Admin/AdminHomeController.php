<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Order;
use App\Models\OrderPaymentMethod;
use App\Models\Product;
use App\Models\User;

;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function index(){

        $userCount = User::count();
        $blogCount = Blog::count();
        $orderCount = Order::whereNotNull('user_id')->count();
        $productCount = Product::count();

        $records = DB::table('products')
        ->join('product_categories', 'products.product_categories_id', '=', 'product_categories.id')
        ->select('product_categories.name as category', DB::raw('COUNT(*) as product_count'))
        ->groupBy('product_categories.name')
        ->get();

        $datas = [];
        $datas[] = ['category', 'product_count'];
        foreach ($records as $record) {
            $datas[] = [$record->category, $record->product_count];
        }

        $blogRecords = DB::table('blogs')
        ->join('article_categories', 'blogs.article_category_id', '=', 'article_categories.id')
        ->select('article_categories.name as category', DB::raw('COUNT(*) as blog_count'))
        ->groupBy('article_categories.name')
        ->get();

        $blogDatas = [];
        $blogDatas[] = ['category', 'blog_count'];
        foreach ($blogRecords as $blogRecord) {
            $blogDatas[] = [$blogRecord->category, $blogRecord->blog_count];
        }

        $revenues = DB::table('orders')
        ->join('order_payment_methods', 'orders.id', '=', 'order_payment_methods.order_id')
        ->select(DB::raw('MONTH(orders.created_at) as month, SUM(order_payment_methods.total_balance) as total_revenue_month'))
        ->where('orders.status', '=', 'done')
        ->whereYear('orders.created_at', date('Y'))
        ->groupBy(DB::raw('MONTH(orders.created_at)'))
        ->get();

        $revenueDatas = [];
        foreach ($revenues as $item) {
            $revenueDatas[] = [(string)$item->month, (int)$item->total_revenue_month];
        }

        $revenueYear = DB::table('orders')
        ->join('order_payment_methods', 'orders.id', '=', 'order_payment_methods.order_id')
        ->select(DB::raw('YEAR(orders.created_at) as year, SUM(order_payment_methods.total_balance) as total_revenue_year'))
        ->where('orders.status', '=', 'done')
        ->groupBy(DB::raw('YEAR(orders.created_at)'))
        ->get();

        
        $revenueYearDatas = [];
        foreach ($revenueYear as $item) {
            $revenueYearDatas[] = [(string)$item->year, (int)$item->total_revenue_year];
        }
        

        return view('admin.pages.home', compact('datas','blogDatas','userCount','blogCount','orderCount','productCount','revenueDatas','revenueYearDatas'));
    }




}
