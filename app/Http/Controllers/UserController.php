<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($user->password);
        if($request->hasFile("image"))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != "jpeg" )
            {
                return redirect->route('user.create')->with('loi','Bạn chỉ được nhập file ảnh có đuôi png,jpg,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_". $name;
            while (file_exists("upload/user".$Hinh)) {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("upload/user",$Hinh);
            $user->image = $Hinh;
        }
        else {
            $user->image = "";
        }
        $user->save();
        return redirect()->route('user.show',$user)->with('thongbao','Thêm thành công.');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show',compact('user'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->all());
        $user->password = Hash::make($user->password);
        if($request->hasFile("image"))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != "jpeg" )
            {
                return redirect("admin/tintuc/them")->with('loi','Bạn chỉ được nhập file ảnh có đuôi png,jpg,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_". $name;
            while (file_exists("upload/user".$Hinh)) {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("upload/user",$Hinh);
            $user->image = $Hinh;
        }
        else {
            $user->image = "";
        }
        $user->save();
        return redirect()->route('user.show',$user)->with('thongbao','Sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('destroy_success');
        return redirect()->route('user.index')->with('thongbao','Xóa thành công.');
    }
}
