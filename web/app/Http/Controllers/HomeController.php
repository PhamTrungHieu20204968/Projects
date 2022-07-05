<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RestaurantRequest;
use DB;


class HomeController extends Controller
{
    //
    public $data=[];
    public function index(){
        $this->data['title']='Trang chủ';

        // $list=DB::select('SELECT * FROM restaurant WHERE id=:id',[
        //     'id' => 1
        // ]);
        // dd($list);
        return view('clients.home',$this->data);
    }

    public function getAdd(){
        $this->data['title']='Thêm nhà hàng';
        return view('clients.add',$this->data);
    }

    // public function postAdd(RestaurantRequest $request){

    // //     $rule=[
    // //         'name'=> 'required',
    // //         'phone' => 'required|numeric',
    // //         'Address' => 'required',
    // //     ];

    // //     $message=[
    // //         'name.required' => 'Không được bỏ trống!',
    // //         'phone.required' => 'Không được bỏ trống!',
    // //         'Address.required' => 'Không được bỏ trống!',
    // //         'phone.numeric' =>'Vui lòng nhập lại SĐT'
    // //     ];
    // //    $request->validate($rule,$message);

    //    //them du lieu vao database
    //    return redirect()->route('list')->with('msg','Thêm thành công');


    // }

    public function downloadImage(Request $request){
        if(!empty($request->image)){
            $image=trim($request->image);

            $file_name='image_'.uniqid().'.jpg';

           return response()->download($image,$file_name);
        }
    }

    public function checkLogin(Request $request){
        $title='Login';
        
        return view('clients.login',compact('title'));
    }

    public function postCheckLogin(Request $request){
        $admin=DB::select('SELECT * FROM user WHERE fullname=:fullname and pass=:pass',[$request->fullname,$request->pass]);

        if(!empty($admin)){
            $request->session()->put('login', 'true');
            
            return redirect()->route('home')->with('msg','Đăng nhâp thành công');
        }else{
            $request->session()->put('login', 'false');
            return redirect()->route('checkLogin')->with('msg','Tên tài khoản hoặc mật khẩu không đúng!');
        }
    }

    public function logout(Request $request){
        
        $request->session()->put('login', 'false');
        return redirect()->route('checkLogin');
    }
}
