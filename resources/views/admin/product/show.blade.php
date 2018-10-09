@extends('admin.layouts.index')
@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <div class="row">
                <p>Tên sản phẩm : {{$product->name}}</p>
                <p>Giá sản phẩm : {{$product->price}}</p>
                <p>Số lượng sản phẩm :{{$product->quantity}}</p>
                <p><img width="300px" src="upload/product/{{$product->image}}"></p>
            	<p>Id Thể loại : {{$product->category_id}}</p>
            </div>
            <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection