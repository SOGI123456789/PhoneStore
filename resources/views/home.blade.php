
@extends('layouts.admin')   <!-- khi view home được load sẽ bắt đầu tìm layouts\admin để extend -->

@section('title', )
    <title>Trang chủ</title>
    @section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name'=>'Home','key'=>'Home'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                   <div class="col-md-12">
                      Trang chủ
                   </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

