@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">

                    @include('admin.layout.messages')
                    <form action="{{action('ProductController@store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input class="form-control" name="name" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label>Intro</label>
                            <input class="form-control" name="intro" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label>Ưu đãi 1</label>
                            <input class="form-control" name="promo1" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label>Ưu đãi 2</label>
                            <input class="form-control" name="promo2" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label>Ưu đãi 3</label>
                            <input class="form-control" name="promo3" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label>Phụ kiện</label>
                            <input class="form-control" name="packet" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input class="form-control" name="images" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label>Review</label>
                            <input class="form-control" name="review" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label>Tag</label>
                            <input class="form-control" name="tag" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input class="form-control" name="price" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input class="form-control" name="status" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label>Category_id</label>
                            <select class="form-control" name="cat_id">
                                @foreach($category as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm sản phẩm</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection