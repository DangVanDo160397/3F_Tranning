@extends('admin.layouts.index')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                   
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thể loại</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                         @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <tbody>
                        	@foreach($product as $pr)
                            <tr class="odd gradeX" align="center">
                                <td>{{$pr->id}}</td>
                                <td>{{$pr->name}}</td>
                                <td>{{$pr->price}}</td>
                                <td>{{$pr->quantity}}</td>
                                <td>{{$pr->category_id}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw" ></i><form action="{{route('product.destroy',$pr)}}" style="display: inline-table;" method="POST">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <button type="submit" style="background: none;border: none;">Xóa</button>
                                    
                                </form></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('product.edit',$pr)}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection