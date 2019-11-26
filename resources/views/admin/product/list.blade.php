@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper" style=" margin-left: 210px;margin-right: -300px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header">Tất cả sản phẩm
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @include('admin.layout.messages')
            <p>Tìm thấy {{count($products)}} sản phẩm</p>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Tenkhongdau</th>
                    <th>Giới Thiệu</th>
                    <th>Ưu đãi 1</th>
                    <th>Ưu đãi 2</th>
                    <th>Ưu đãi 3</th>
                    <th>Phụ kiện</th>
                    <th>Ảnh</th>
                    <th>Tag</th>
                    <th>Giá</th>
                    <th>Category</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $pro)
                        <tr class="odd gradeX" align="center">
                            <td>{{$pro->id}}</td>
                            <td>{{$pro->name}}</td>
                            <td>{{$pro->slug}}</td>
                            <td>{{$pro->intro}}</td>
                            <td>{{$pro->promo1}}</td>
                            <td>{{$pro->promo2}}</td>
                            <td>{{$pro->promo3}}</td>
                            <td>{{$pro->packet}}</td>
                            <td>{{$pro->images}}</td>
                            <td>{{$pro->tag}}</td>
                            <td>{{$pro->price}}</td>
                            <td>{{$pro->category->name}}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$pro->id}}">Edit</a></td>
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