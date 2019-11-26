@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể loại
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">

                    {{--{!! Form::open(['action' => ['TheLoaiController@update',$edit->id],'method'=>'post']) !!}

                    <div class="form-group">
                        {{Form::label('Tên thể loai')}}
                        {{Form::text('Ten',$edit->Ten,['class'=>'form-control','placeholder'=>'Nhap ten the loai'])}}
                    </div>

                    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                    {{Form::hidden('_method','PUT')}}--}}{{-- DÒNG CODE NÀY DÙNG ĐỂ CÓ THỂ UPDATE ĐƯỢC DỮ LIỆU

                    METHOD PUT DÙNG ĐỂ SỬA DỮ LIỆU CÒN PHƯƠNG THỨC DELETE ĐỂ XÓA DỮ LIỆU
                    NHƯNG 2 PHƯƠNG THỨC NÀY KHÔNG ĐƯỢC ÁP DỤNG TRONG method CỦA HTML LÊN TA PHẢI SỬ DỤNG HIDDEN METHOD _method--}}{{--

                    {!! Form::close() !!}--}}
                    <form method="post" action="admin/category/edit/{{$edit->id}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên thể loại</label>
                            <input class="form-control" name="name" placeholder="Please Enter Category Name" value="{{$edit->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Id_parent</label>
                            <select class="form-control" name="parent_id">
                                @foreach($categorychung as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection