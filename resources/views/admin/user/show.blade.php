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
                <p>Username : {{$user->name}}</p>
                <p>Email : {{$user->email}}</p>
                <p><img width="300px" src="upload/user/{{$user->image}}"></p>
            </div>
            <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection