<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:users,name|min:3|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:30'
        ],[
            'name.required' => ' Username không được để trống.',
            'name.unique' => 'Username đã tồn tại.',
            'name.min' => 'Username không ít hơn 3 kí tự.',
            'name.max' => 'Username không lớn hơn 30 ký tự',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Không đúng định dạng email.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Password không được để trống.',
            'password.min' => 'Password không dưới 3 kí tự.',
            'password.max' => 'Password không lớn hơn 30 ký tự',

        ]);

        $user = User::create($request->all());

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
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name' => 'required|unique:users,name|min:3|max:30',
            'email' => 'required|email|unique:users,email',
        ],[
            'name.required' => ' Username không được để trống.',
            'name.unique' => 'Username đã tồn tại.',
            'name.min' => 'Username không ít hơn 3 kí tự.',
            'name.max' => 'Username không lớn hơn 30 ký tự',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Không đúng định dạng email.',
            'email.unique' => 'Email đã tồn tại.'
        ]);
        $user->update($request->all());
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
