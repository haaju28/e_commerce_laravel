<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $fillable = [
        'image', 'title','created_at', 'updated_at', 'sub_title', 'status'
    ];

    public function add($request){
        $imageName = null;
        if ($request->image) {
            $imageName = uniqid() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
        }
        $banners = Banner::create([
            'image' => $imageName,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'status' => $request->status,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return $banners;
    }

    public function updateById($request,$id){
        $banner = Banner::find($id);
        if ($banner) {
            $oldImage = $banner->image;
            $imageName = $oldImage;

            if ($request->image) {
                $imageName = uniqid() . '_' . $request->image->getClientOriginalName();
                $request->image->move(public_path('images'), $imageName);
                if (!is_null($oldImage) && file_exists("images/" . $oldImage)) {
                    unlink("images/" . $oldImage);
                }
            }

            $updateData = [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'status' => $request->status,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if (!is_null($imageName)) {
                $updateData['image'] = $imageName;
            }

            $banner->update($updateData);
        }
        return $banner;
    }


    public function getAll(){
        return Banner::all();
    }

    public function getById($id){
        return Banner::find($id);
    }

    public function deleteById($id)
    {
        $banners = Banner::find($id);
        $banners->delete();
        return $banners;
    }
}
