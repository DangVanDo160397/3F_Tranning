<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\ProductRequest;

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
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->fill($request->all());
        if($request->hasFile("image"))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != "jpeg" )
            {
                return redirect()->route('product.create')->with('loi','Bạn chỉ được nhập file ảnh có đuôi png,jpg,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_". $name;
            while (file_exists("upload/product".$Hinh)) {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("upload/product",$Hinh);
            $product->image = $Hinh;
        }
        else {
            $product->image = "";
        }
        $product->save();
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
    public function update(ProductRequest $request, Product $product)
    {
        $product->fill($request->all());
        if($request->hasFile("image"))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != "jpeg" )
            {
                return redirect()->route('product.create')->with('loi','Bạn chỉ được nhập file ảnh có đuôi png,jpg,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_". $name;
            while (file_exists("upload/product".$Hinh)) {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("upload/product",$Hinh);
            $product->image = $Hinh;
        }
        else {
            $product->image = "";
        }
        $product->save();
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
