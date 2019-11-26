@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper" style=" margin-left: 210px;margin-right: -300px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể Loại
                        <small>{{$category->name}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Tên không dấu</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>

                    {{--<tr class="odd gradeX" align="center">
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{str_slug($category->name)}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/category/delete/{{$category->id}}"> Delete</a>
                        </td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                    href="admin/category/edit/{{$category->id}}">Edit</a></td>
                    </tr>--}}
                    @foreach($category->products as $pro)
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
       {{-- {!!Form::open(['action'=>['TheLoaiController@destroy',$category->id],'method'=>'POST','class'=>'float-right']) !!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Xóa',['class'=>'btn btn-danger'])}}
        {!! Form::close() !!}--}}
    </div>
    <!-- /#page-wrapper -->
@endsection