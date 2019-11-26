<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Cart;
use App\Category;
use App\Pro_details;
use App\Products;
use App\Slide;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PagesController extends Controller
{
    public function getIndex()
    {
        $mobile = DB::table('products')
            ->join('category', 'products.cat_id', '=', 'category.id')
            ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
            ->where('category.parent_id','=','1')
            ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
            ->paginate(8);
        $laptop = DB::table('products')
            ->join('category', 'products.cat_id', '=', 'category.id')
            ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
            ->where('category.parent_id','=','2')
            ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
            ->paginate(6);
        $pc = DB::table('products')
            ->join('category', 'products.cat_id', '=', 'category.id')
            ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
            ->where('category.parent_id','=','19')
            ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
            ->paginate(4);

        $slide=Slide::all();
        $product=Products::all();

        return view('trangchu',compact('product','mobile','laptop','pc','slide'));
    }

    public function getDetailProduct(Request $request)
    {

        $data=Pro_details::where('pro_id',$request->id)->first();
        return view('detail_product',compact('data'));
    }

    public function getCategory(Request $request)
    {
        $cat=Category::where('id',$request->id)->first();
        $category=Products::where('cat_id',$request->id)->get();
        return view('category',compact('category','cat'));
    }
    public function getContact()
    {
        return view('contact');
    }
    public function getAbout()
    {
        return view('about');
    }
    /*public function getGioiThieu()
    {
        return view('page.gioi_thieu');
    }*/
    public function AddToCart(Request $req,$id)
    {
        $product= Products::find($id);
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart= new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function DelItemCart($id)
    {
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart= new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart',$cart);
    return redirect()->back();
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postregister(Request $request)
    {
        $this->validate($request,[
               'email'=>'required|unique:users,email|email',
               'password'=>'required|min:6|max:20',
               'name'=>'required',
               're_password'=>'required|same:password'
           ],[
                'email.required'=>'Vui lòng nhập email',
               'email.unique'=>'Email đã có người sử dụng',
               'email.email'=>'Không đúng định dạng email',
               'password.required'=>'Vui lòng nhập password',
               'password.min'=>'Password có từ 6 tới 20 kí tự',
               'password.max'=>'Password có từ 6 tới 20 kí tự',
               're_password.required'=>'Vui lòng nhập mật khẩu xác nhận',
               're_password.same'=>'Mật khẩu xác nhận không chính xác']);
               $user=new User();

           $user->name=$request->name;
           $user->phone=$request->phone;
           $user->password=Hash::make($request->password);
           $user->password=Hash::make($request->password);
           $user->email=$request->email;
           $user->address=$request->address;
           $user->save();
           return redirect()->back()->with('success','Đăng kí thành công');
    }

    public function login()
    {
        return view('auth.login');
    }
    public function postlogin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],[
            'email.required'=>'Nhập email',
            'email.email'=>'Email không đúng định dạng',
            'password.required'=>'Nhập mật khẩu',
            'password.min'=>'Nhập mật khẩu từ 6 tới 20 kí tự',
            'password.max'=>'Nhập mật khẩu từ 6 tới 20 kí tự'
        ]);
        $data=array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($data)){
            return redirect()->back()->with('success','Đăng nhập thành công');}
            else{
                return redirect()->back()->with('fail','Đăng nhập thất bại');
            }

    }

    public function postLogout()
    {
        Auth::logout();
        return redirect()->route('trangchu');
    }

    public function getSearch(Request $request)
    {
        $product=Products::where('name','like','%'.$request->key.'%')->orWhere('intro','like','%'.$request->key.'%')->orWhere('tag','like','%'.$request->key.'%')->get();
        return view('search')->with('product',$product);
    }

    public function historybuy()
    {
        $id=Auth::user()->id;
        $history=Bill::where('id_user','=',$id)->get();

        return view('historybuy',compact('history'));
    }

}

