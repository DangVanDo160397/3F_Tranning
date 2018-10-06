@extends('admin.layouts.index')
@section('content')
	<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-11" style="padding-bottom:120px">
                    	@if(count($errors) > 0)
                    		<div class="alert alert-danger">
                    			@foreach($errors->all() as $err)
                    				{{$err}} <br>
                    			@endforeach
                    		</div>
                    	@endif
                        <form action="{{route('product.update',$product)}}" method="POST">
                        	{{csrf_field()}} {{method_field('PUT')}}
                        	<div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="category_id">
                                    @foreach($category as $ca)
                                        <option 
                                        @if($product->category_id == $ca->id)
                                    		{{"selected"}}
                                        @endif
                                        value="{{$ca->id}}">{{$ca->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="name" value="{{$product->name}}" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" name="price" value="{{$product->price}}" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input class="form-control" name="quantity" value="{{$product->quantity}}" placeholder="Please Enter Password" />
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection