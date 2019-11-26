<?php

namespace App\Http\Controllers;

use App\Bill;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function getList()
    {
        $users=User::all();
        return view('admin.user.danhsach',compact('users'));
    }
    public function show($id)
    {
        $history=Bill::find($id)->get();

        return view('admin.user.show',compact('history'));
    }

    public function background($id)
    {
        $data=Auth::user()->id;
        $user=User::where('id','=',$id)->get();
        return view('background',compact('user','data'));
    }

    public function changepass1()
    {
        $data=Auth::user()->id;
        return view('changepass',compact('data'));
    }
    public function changepass(Request $request,$id)
    {

        $this->validate($request,[
            'old_password'=>'required',
            'password'=>'required|min:6|max:20',
            're_password'=>'required|same:password'
        ],[
            'password.required'=>'Vui lòng nhập password',
            'password.min'=>'Password có từ 6 tới 20 kí tự',
            'password.max'=>'Password có từ 6 tới 20 kí tự',
            'old_password.required'=>'Vui lòng nhập password',
            're_password.required'=>'Vui lòng nhập mật khẩu xác nhận',
            're_password.same'=>'Mật khẩu xác nhận không chính xác']);
        $user=User::find($id);
        if (Hash::check($request->old_password,$user->password)){
            $user->password=Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success','Sửa mật khẩu thành công');
        }
        else{

            return redirect()->back()->with('fail','Mật khẩu cũ không chính xác');
        }


    }
}
