<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorCreateRequest;
use App\Models\Color;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    private $colorModel;
    
    public function __construct(Color $colorModel)
    {
        $this->colorModel = $colorModel;
    }

    public function getSlug(Request $request){
        $slug = SlugService::createSlug(Color::class, 'slug', $request->name);
        return response()->json(['slug'=>$slug]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = $this->colorModel->getAll();
        return view('admin.pages.product_colors.home',['colors'=>$colors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.pages.product_colors.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorCreateRequest $request)
    {
        $bool=$this->colorModel->add($request);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('color.index')->with('message',$message);
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
        $colors = $this->colorModel->getById($id);
        return view('admin.pages.product_colors.detail',['colors'=>$colors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ColorCreateRequest $request, $id)
    {
        $bool=$this->colorModel->updateById($request,$id);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('color.index')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colors = $this->colorModel->deleteById($id);
        $message='Fail';
        if($colors){
            $message='Successful';
        }
        return redirect()->route('color.index')->with('message',$message);
    }

    public function restore($id)
    {
        $colors = $this->colorModel->restoreById($id);
        $message='Fail';
        if($colors){
            $message='Successful';
        }
        return redirect()->route('color.index')->with('message',$message);
    }
}
