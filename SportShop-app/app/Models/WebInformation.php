<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebInformation extends Model
{
    use HasFactory;
    protected $table = 'web_information';
    protected $fillable = [
        'web_name',
        'logo_img',
        'address',
        'phone',
        'email',
        'facebook_link',
        'gg_map_link',
    ];

    public function updateById($request, $id)
    {
        $webInformation = WebInformation::find($id);
        if ($webInformation) {
            $oldImage = $webInformation->logo_img;
            $imageName = $oldImage; // Khởi tạo biến $imageName bằng giá trị của $oldImage

            if ($request->logo_img) {
                $imageName = uniqid() . '_' . $request->logo_img->getClientOriginalName();
                $request->logo_img->move(public_path('images'), $imageName);
                if (!is_null($oldImage) && file_exists("images/" . $oldImage)) {
                    unlink("images/" . $oldImage);
                }
            }

            $updateData = [
                'web_name' => $request->web_name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'facebook_link' => $request->facebook_link,
                'gg_map_link' => $request->gg_map_link,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            // Thêm trường 'logo_img' vào mảng $updateData chỉ khi $imageName khác null
            if (!is_null($imageName)) {
                $updateData['logo_img'] = $imageName;
            }

            $webInformation->update($updateData);
        }
        return $webInformation;
    }


    public function getAll()
    {
        return WebInformation::first();
    }
}
