<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Bill_detail;
use App\Cart;
use App\Oders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OdersController extends Controller
{
    public function getCheckOut()
    {
        if (Session::has('cart')){
            $oldCart=Session::get('cart');
            $cart=new Cart($oldCart);
            return view('dat_hang',['product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
        }
        else{
            return view('dat_hang');
        }
    }

    public function postCheckOut(Request $request)
    {
        $cart=Session::get('cart');
        $this->validate($request,[
           'name'=>'required|min:2',
            'gender'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'note'=>'required'

        ],[
            'name.required'=>'Bạn cần điền tên',
            'name.min'=>'Bạn không điền tên quá ngắn',
            'gender.required'=>'Bạn cần chọn giới tính',
            'address.required'=>'Bạn cần điền địa chỉ',
            'phone.required'=>'Bạn cần điền số điện thoại',
            'note.required'=>'Bạn cần điền địa chỉ nhà cụ thể'
        ]);
        $bill=new Bill();
        $bill->id_user=Auth::user()->id;
        $bill->date_order=date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$request->payment_method;
        $bill->note=$request->note;
        $bill->name_user_order=$request->name;
        $bill->gender_user_order=$request->gender;
        $bill->save();

        foreach ($cart->items    as $key=>$value){
            $bill_detail=new Bill_detail();
            $bill_detail->id_bill=$bill->id;
            $bill_detail->id_product=$key;
            $bill_detail->quantity=$value['qty'];
            $bill_detail->price=$value['price']/$value['qty'];
            $bill_detail->save();

        }
        Session::forget('cart');
        return redirect()->back()->with('success','Bạn đã đặt hàng thành công');

    }


}
