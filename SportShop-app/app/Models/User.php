<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'status',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function add($request){
        // $request = $request->except('_token');
        $users = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'status' => $request->status,
            'role'=> $request->role,    
            'password'=> Hash::make($request->password),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return $users;
    }

    public function updateById($request,$id){
        $users = User::find($id);
        $users->update([
            'status' => $request->status,
            'role'=> $request->role,    
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return $users;
    }

    public function updateProfileById($request,$id){
        $users = User::find($id);
        $users->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return $users;
    }

    public function changePasswordById($request,$id){
        $users = User::find($id);
        $users->update([
            'password' => Hash::make($request->password),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return $users;
    }

    public function getAll(){
        return User::all();
    }

    public function getById($id){
        return User::find($id);
    }

    public function deleteById($id)
    {
        $users = User::find($id);
        $users->delete();
        return $users;
    }
}
