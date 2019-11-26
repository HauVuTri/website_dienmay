@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể loại
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">

                    @include('admin.layout.messages')
                    <form action="{{action('CategoryController@store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên thể loại</label>
                            <input class="form-control" name="name" placeholder="Please Enter Category Name"/>
                        </div>
                        <div class="form-group">
                            <label>Id_parent</label>
                            <select class="form-control" name="parent_id">
                                @foreach($categorychung as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm thể loại</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection