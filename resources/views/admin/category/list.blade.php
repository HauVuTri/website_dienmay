@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper" style=" margin-left: 210px>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header">Thể Loại
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @include('admin.layout.messages')
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Parent_id</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($category as $cat)
                        <tr class="odd gradeX" align="center">
                            <td><a href="admin/category/{{$cat->id}}">{{$cat->id}}</a> </td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->parent_id}}</td>

                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/category/edit/{{$cat->id}}">Edit</a></td>
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