<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = Category::all();
        return view('admin.cate.index',compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cate.add');
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
            'name' => 'required|unique:categories,name|min:3|max:30'
        ],[
            'name.required' => 'Tên thể loại không được để trống.',
            'name.unique' => 'Tên thể loại đã tồn tại.',
            'name.min' => 'Tên thể loại không ít hơn 3 kí tự.',
            'name.max' => 'Tên thể loại không lớn hơn 30 ký tự'

        ]);

        $category = Category::create($request->all());

        return redirect()->route('category.show',$category)->with('thongbao','Thêm thành công.');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.cate.show',compact('category'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.cate.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories,name|min:3|max:30'
        ],[
            'name.required' => 'Tên thể loại không được để trống.',
            'name.unique' => 'Tên thể loại đã tồn tại.',
            'name.min' => 'Tên thể loại không ít hơn 3 kí tự.',
            'name.max' => 'Tên thể loại không lớn hơn 30 ký tự'

        ]);
        $category->update($request->all());
        return redirect()->route('category.show',$category)->with('thongbao','Sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('destroy_success');
        return redirect()->route('category.index')->with('thongbao','Xóa thành công.');
    }
}
