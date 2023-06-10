<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileChangepassRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Models\WebInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userModel;
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userModel->getAll();
        return view('admin.pages.users.home',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $bool=$this->userModel->add($request);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('user.index')->with('message',$message);
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
        $users = $this->userModel->getById($id);
        return view('admin.pages.users.detail',['users'=>$users]);
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
        $bool=$this->userModel->updateById($request,$id);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('user.index')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = $this->userModel->deleteById($id);
        $message='Fail';
        if($users){
            $message='Successful';
        }
        return redirect()->route('user.index')->with('message',$message);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function showProfile($id){
        $users = $this->userModel->getById($id);
        $webInfors = WebInformation::first();
        return view('client.pages.user',compact('users','webInfors'));
    }

    public function updateProfile(UserUpdateRequest $request, $id){
        $bool=$this->userModel->updateProfileById($request,$id);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('home')->with('message',$message);
    }

    public function updatePasswordProfile(ProfileChangepassRequest $request, $id){
        $bool=$this->userModel->changePasswordById($request,$id);

        $message='Fail';
        if($bool){
            $message='Successful';
        }

        return redirect()->route('home')->with('message',$message);
    }

    public function showChangePassProfile($id){
        $users = $this->userModel->getById($id);
        $webInfors = WebInformation::first();
        return view('client.pages.change_password',compact('users','webInfors'));
    }
}
