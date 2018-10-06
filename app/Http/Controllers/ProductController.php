<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $product = Product::all();
        return view('admin.product.index',compact('category','product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.add',compact('category'));
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
            'name' => 'required|unique:products,name|min:3|max:30',
            'price' => 'required|integer|min:3',
            'quantity' => 'required|integer',
            'category_id' => 'required'
        ],[
            'name.required' => 'Tên sản phẩm không được để trống.',
            'name.unique' => 'Tên sản phẩm đã tồn tại.',
            'name.min' => 'Tên sản phẩm không ít hơn 3 kí tự.',
            'name.max' => 'Tên sản phẩm không lớn hơn 30 ký tự',
            'price.required' => 'Giá sản phẩm không được để trống.',
            'price.integer' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm không ít hơn 3 chữ số.',
            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.integer' => 'Số lượng phải là số.',
            'category_id' => 'Tên thể loại không được để trống.'
        ]);

        $product = Product::create($request->all());

        return redirect()->route('product.show',$product)->with('thongbao','Thêm thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $category = Category::all();
        return view('admin.product.edit',compact('category','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name' => 'required|unique:products,name|min:3|max:30',
            'price' => 'required|integer|min:3',
            'quantity' => 'required|integer',
            'category_id' => 'required'
        ],[
            'name.required' => 'Tên sản phẩm không được để trống.',
            'name.unique' => 'Tên sản phẩm đã tồn tại.',
            'name.min' => 'Tên sản phẩm không ít hơn 3 kí tự.',
            'name.max' => 'Tên sản phẩm không lớn hơn 30 ký tự',
            'price.required' => 'Giá sản phẩm không được để trống.',
            'price.integer' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm không ít hơn 3 chữ số.',
            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.integer' => 'Số lượng phải là số.',
            'category_id' => 'Tên thể loại không được để trống.'
        ]);
        $product->update($request->all());
        return redirect()->route('product.show',$product)->with('thongbao','Sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('destroy_success');
        return redirect()->route('product.index')->with('thongbao','Xóa thành công.');
    }
}
