<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\ProductCategories;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WishlistController extends Controller
{
    private $wishlistModel,$proCteModel;
    public function __construct(Wishlist $wishlistModel,ProductCategories $proCteModel)
    {
        $this->wishlistModel = $wishlistModel;
        $this->proCteModel = $proCteModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->wishlistModel->getAll();
        $productCategories = $this->proCteModel->getAll();
        return view('client.pages.wishlist',compact('products','productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bool = $this->wishlistModel->removeProductToWishlist($id);
        $message='Fail';
        if($bool){
            $message='Successful';
        }
        return Redirect::back()->with('message',$message);
    }


    public function addToWishlist($id){
        $bool = $this->wishlistModel->addProductToWishlist($id);
        $message='Fail';
        if($bool){
            $message='Successful';
        }
        return Redirect::back()->with('message',$message);
    }
}
