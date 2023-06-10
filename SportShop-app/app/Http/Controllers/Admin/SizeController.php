<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\SizeCreateRequest;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    private $sizeModel;
    
    public function __construct(Size $sizeModel)
    {
        $this->sizeModel = $sizeModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = $this->sizeModel->getAll();
        return view('admin.pages.product_sizes.home',['sizes'=>$sizes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.product_sizes.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SizeCreateRequest $request)
    {
        $bool=$this->sizeModel->add($request);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('size.index')->with('message',$message);
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
        $sizes = $this->sizeModel->getById($id);
        return view('admin.pages.product_sizes.detail',['sizes'=>$sizes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SizeCreateRequest $request, $id)
    {
        $bool=$this->sizeModel->updateById($request,$id);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('size.index')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sizes = $this->sizeModel->deleteById($id);
        $message='Fail';
        if($sizes){
            $message='Successful';
        }
        return redirect()->route('size.index')->with('message',$message);
    }

    
    public function restore($id)
    {
        $sizes = $this->sizeModel->restoreById($id);
        $message='Fail';
        if($sizes){
            $message='Successful';
        }
        return redirect()->route('size.index')->with('message',$message);
    }
}
