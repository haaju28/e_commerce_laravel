<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'sizes';

    protected $fillable = [
        'name','created_at', 'updated_at', 'status',
    ];

    public function add($request){
        $sizes = Size::create([
            'name' => $request->name,
            'status' => $request->status,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return $sizes;
    }

    public function updateById($request,$id){
        $sizes = Size::find($id);
        $sizes->update([
            'name' => $request->name,
            'status' => $request->status,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return $sizes;
    }


    public function getAll(){
        return Size::withTrashed()->get();
    }

    public function getById($id){
        return Size::find($id);
    }

    public function deleteById($id)
    {
        $sizes = Size::find($id);
        $sizes->delete();
        return $sizes;
    }
    public function restoreById($id){
        $sizes = Size::withTrashed()->find($id)->restore();
        return $sizes;
    }
}
