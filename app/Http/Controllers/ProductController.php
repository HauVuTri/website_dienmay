<?php

namespace App\Http\Controllers;

use App\Category;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getList()
    {
        $products=Products::all();
        return view('admin.product.list',compact('products'));
    }
    public function create()
    {
        $category=DB::table('category')
        ->where('parent_id','!=','0')->get()
        ;
        return view('admin.product.create',compact('category'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3|max:100',
            'intro'=>'required',
            'promo1'=>'required',
            'promo2'=>'required',
            'promo3'=>'required',
            'cat_id'=>'required',
            'packet'=>'required',
            'images'=>'required',
            'review'=>'required',
            'tag'=>'required',
            'price'=>'required',
            'status'=>'required|min:0|max:1'
        ], [
            'name.required'=>'Nhập tên sản phẩm muốn thêm',
            'intro.required'=>'Nhập tên intro muốn thêm',
            'promo1.required'=>'Nhập tên ưu đãi 1 muốn thêm',
            'promo2.required'=>'Nhập tên ưu đãi 2 muốn thêm',
            'promo3.required'=>'Nhập tên ưu đãi 3 muốn thêm',
            'packet.required'=>'Nhập tên phụ kiện muốn thêm',
            'images.required'=>'Nhập tên ảnh muốn thêm',
            'review.required'=>'Nhập tên review muốn thêm',
            'tag.required'=>'Nhập tên tag muốn thêm',
            'price.required'=>'Nhập tên giá muốn thêm',
            'status.required'=>'Nhập tên status muốn thêm',
            'status.min'=>'Trạng thái status chọn 1 là còn hàng,0 là hết hàng',
            'status.max'=>'Trạng thái status chọn 1 là còn hàng,0 là hết hàng',
            'name.min'=>'Nhập tên sản phẩm tối thiểu 2 kí tự và nhiều nhất 100 kí tự',
            'name.max'=>'Nhập tên sản phẩm tối thiểu 2 kí tự và nhiều nhất 100 kí tự',
            'cat_id.required'=>'Chọn mã parent_id của thể loại'
        ]);
        $create=new Products();
        $create->name=$request->name;
        $create->intro=$request->intro;
        $create->promo1=$request->promo1;
        $create->promo2=$request->promo2;
        $create->promo3=$request->promo3;
        $create->packet=$request->packet;
        $create->images=$request->images;
        $create->review=$request->review;
        $create->tag=$request->tag;
        $create->price=$request->price;
        $create->status=$request->status;
        $create->cat_id=$request->cat_id;
        $create->slug=str_slug($request->name);
        $create->save();
        return redirect('admin/product/create')->with('success','Thêm thành công sản phẩm');

    }

    public function edit($id)
    {
        $category=DB::table('category')
            ->where('parent_id','!=','0')->get();
        $edit=Products::find($id);
        return view('admin.product.edit',compact('edit','category'));
    }

    public function update(Request $request,$id)
    {
        $update=Products::find($id);
        $this->validate($request,[
            'name'=>'required|min:3|max:100',
            'intro'=>'required',
            'promo1'=>'required',
            'promo2'=>'required',
            'promo3'=>'required',
            'cat_id'=>'required',
            'packet'=>'required',
            'images'=>'required',
            'review'=>'required',
            'tag'=>'required',
            'price'=>'required',
            'status'=>'required|min:0|max:1'
        ], [
            'name.required'=>'Nhập tên sản phẩm muốn thêm',
            'intro.required'=>'Nhập tên intro muốn thêm',
            'promo1.required'=>'Nhập tên ưu đãi 1 muốn thêm',
            'promo2.required'=>'Nhập tên ưu đãi 2 muốn thêm',
            'promo3.required'=>'Nhập tên ưu đãi 3 muốn thêm',
            'packet.required'=>'Nhập tên phụ kiện muốn thêm',
            'images.required'=>'Nhập tên ảnh muốn thêm',
            'review.required'=>'Nhập tên review muốn thêm',
            'tag.required'=>'Nhập tên tag muốn thêm',
            'price.required'=>'Nhập tên giá muốn thêm',
            'status.required'=>'Nhập tên status muốn thêm',
            'status.min'=>'Trạng thái status chọn 1 là còn hàng,0 là hết hàng',
            'status.max'=>'Trạng thái status chọn 1 là còn hàng,0 là hết hàng',
            'name.min'=>'Nhập tên sản phẩm tối thiểu 2 kí tự và nhiều nhất 100 kí tự',
            'name.max'=>'Nhập tên sản phẩm tối thiểu 2 kí tự và nhiều nhất 100 kí tự',
            'cat_id.required'=>'Chọn mã parent_id của thể loại'
        ]);
        $update->name=$request->name;
        $update->intro=$request->intro;
        $update->promo1=$request->promo1;
        $update->promo2=$request->promo2;
        $update->promo3=$request->promo3;
        $update->packet=$request->packet;
        $update->images=$request->images;
        $update->review=$request->review;
        $update->tag=$request->tag;
        $update->price=$request->price;
        $update->status=$request->status;
        $update->cat_id=$request->cat_id;
        $update->slug=str_slug($request->name);
        $update->save();
        return redirect('admin/product/list')->with('success','Sửa sản phẩm thành công');

    }

    public function delete($id)
    {
        $delete=Products::find($id);
        $delete->delete();
        return redirect('admin/product/list')->with('success','Xóa sản phẩm thành công');
    }
}
