@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm {{$edit->name}}
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form method="post" action="admin/product/edit/{{$edit->id}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input class="form-control" name="name" placeholder="" value="{{$edit->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Intro</label>
                            <input class="form-control" name="intro" placeholder=""value="{{$edit->intro}}"/>
                        </div>
                        <div class="form-group">
                            <label>Ưu đãi 1</label>
                            <input class="form-control" name="promo1" placeholder=""value="{{$edit->promo1}}"/>
                        </div>
                        <div class="form-group">
                            <label>Ưu đãi 2</label>
                            <input class="form-control" name="promo2" placeholder=""value="{{$edit->promo2}}"/>
                        </div>
                        <div class="form-group">
                            <label>Ưu đãi 3</label>
                            <input class="form-control" name="promo3" placeholder=""value="{{$edit->promo3}}"/>
                        </div>
                        <div class="form-group">
                            <label>Phụ kiện</label>
                            <input class="form-control" name="packet" placeholder=""value="{{$edit->packet}}"/>
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input class="form-control" name="images" placeholder=""value="{{$edit->images}}"/>
                        </div>
                        <div class="form-group">
                            <label>Review</label>
                            <input class="form-control" name="review" placeholder=""value="{{$edit->review}}"/>
                        </div>
                        <div class="form-group">
                            <label>Tag</label>
                            <input class="form-control" name="tag" placeholder=""value="{{$edit->tag}}"/>
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input class="form-control" name="price" placeholder=""value="{{$edit->price}}"/>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input class="form-control" name="status" placeholder=""value="{{$edit->status}}"/>
                        </div>
                        <div class="form-group">
                            <label>Category_id</label>
                            <select class="form-control" name="cat_id">
                                @foreach($category as $row)
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