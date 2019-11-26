<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getList()
    {

        $category=Category::where('parent_id','!=','0')->get();
        return view('admin.category.list',compact('category'));
 }

    public function create()
    {
        $categorychung=Category::where('parent_id','=',0)->get();
        return view('admin.category.create',compact('categorychung'));
 }
    public function store(Request $request)
    {
        $this->validate($request,[
         'name'=>'required|min:2|max:100',
         'parent_id'=>'required|'
        ], [
          'name.required'=>'Nhập tên thể loại muốn  thêm',
            'name.min'=>'Nhập tên thể loại tối thiểu 2 kí tự và nhiều nhất 100 kí tự',
            'name.max'=>'Nhập tên thể loại tối thiểu 2 kí tự và nhiều nhất 100 kí tự',
            'parent_id.required'=>'Chọn mã parent_id của thể loại'
            ]);
        $create=new Category();
        $create->name=$request->name;
        $create->parent_id=$request->parent_id;
        $create->slug=str_slug($request->name);
        $create->save();
        return redirect('admin/category/create')->with('success','Thêm thành công thể loại');


    }
    public function edit($id)
    {
        $edit=Category::find($id);
        $categorychung=Category::where('parent_id','=',0)->get();
        return view('admin.category.edit',compact('categorychung','edit'));
    }
    public function update(Request $request,$id)
    {
        $category=Category::find($id);
        $this->validate($request,[
            'name'=>'required|min:2|max:100',
            'parent_id'=>'required|'
        ], [
            'name.required'=>'Nhập tên thể loại muốn thêm',
            'name.min'=>'Nhập tên thể loại tối thiểu 2 kí tự và nhiều nhất 100 kí tự',
            'name.max'=>'Nhập tên thể loại tối thiểu 2 kí tự và nhiều nhất 100 kí tự',
            'parent_id.required'=>'Chọn mã parent_id của thể loại'
        ]);

        $category->name=$request->name;
        $category->parent_id=$request->parent_id;
        $category->slug=str_slug($request->name);
        $category->save();
        return redirect('admin/category/create')->with('success','Sửa thể loại thành công');

    }

    public function delete($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect('admin/category/list')->with('success','Xóa thành công thể loại');
    }

    public function show($id)
    {
        $category=Category::find($id);
        return view('admin.category.show',compact('category'));

    }

}
