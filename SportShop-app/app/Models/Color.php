<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory, SoftDeletes,Sluggable;

    protected $table = 'colors';

    protected $fillable = [
        'name', 'slug','created_at', 'updated_at', 'deleted_at', 'status',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function add($request){
        $colors = Color::create([
            'name' => $request->name,
            'slug' => $request->code,
            'status' => $request->status,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return $colors;
    }

    public function updateById($request,$id){
        $colors = Color::find($id);
        $colors->update([
            'name' => $request->name,
            'slug' => $request->code,
            'status' => $request->status,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return $colors;
    }


    public function getAll(){
        return Color::withTrashed()->get();
    }

    public function getById($id){
        return Color::find($id);
    }

    public function deleteById($id)
    {
        $colors = Color::find($id);
        $colors->delete();
        return $colors;
    }

    public function restoreById($id){
        $colors = Color::withTrashed()->find($id)->restore();
        return $colors;
    }
}
