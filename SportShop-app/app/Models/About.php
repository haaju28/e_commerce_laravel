<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'abouts';
    protected $fillable = [
        'first_title',
        'first_image',
        'first_content',
        'second_title',
        'second_image',
        'second_content',
    ];

    public function updateById($request, $id)
    {
        $about = About::find($id);
        if ($about) {
            $oldImage1 = $about->first_image;
            $oldImage2 = $about->second_image;

            $imageName1 = $oldImage1; 
            $imageName2 = $oldImage2;

            if ($request->first_image) {
                $imageName1 = uniqid() . '_' . $request->first_image->getClientOriginalName();
                $request->first_image->move(public_path('images'), $imageName1);
                if (!is_null($oldImage1) && file_exists("images/" . $oldImage1)) {
                    unlink("images/" . $oldImage1);
                }
            }

            if ($request->second_image) {
                $imageName2 = uniqid() . '_' . $request->second_image->getClientOriginalName();
                $request->second_image->move(public_path('images'), $imageName2);
                if (!is_null($oldImage2) && file_exists("images/" . $oldImage2)) {
                    unlink("images/" . $oldImage2);
                }
            }

            $updateData = [
                'first_title' => $request->first_title,
                'first_content' => $request->first_content,
                'second_title' => $request->second_title,
                'second_content' => $request->second_content,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if (!is_null($imageName1)) {
                $updateData['first_image'] = $imageName1;
            }

            if (!is_null($imageName2)) {
                $updateData['second_image'] = $imageName2;
            }

            $about->update($updateData);
        }
        return $about;
    }


    public function getAll()
    {
        return About::first();
    }
}
