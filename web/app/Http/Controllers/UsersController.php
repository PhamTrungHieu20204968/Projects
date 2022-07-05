<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Users;
use App\Http\Requests\RestaurantRequest;

class UsersController extends Controller
{
    //
    private $restaurants;
    public function __construct(){

        $this->restaurants=new Users();
    }

    public function index(){
        $title='Danh sách nhà hàng';
       
        $restaurantsList=$this->restaurants->getAllData();
        // DB::select('SELECT * FROM restaurant WHERE id=:id',[
        //     'id' => 1
        // ]);
        return view('clients.list',compact('title','restaurantsList'));
    }

    public function Add(){
        $title='Thêm nhà hàng';

        return view('clients.add',compact('title'));
    }

    public function postAdd(RestaurantRequest $request){

        //  return redirect()->route('users')->with('msg','Thêm thành công');
            $dataInsert=[
                $request->fullname,
                $request->phone,
                $request->Address,
                $request->image,
                date('Y-m-d H:i:s')
            ];

            $this->restaurants->addData($dataInsert);

            return redirect()->route('users.index')->with('msg','Thêm thành công');
    }

    public function getEdit(Request $request,$id=0){
        $title='Sửa nhà hàng';
        if(!empty($id)){
            $restaurantDetail=$this->restaurants->getDetail($id);
            if(!empty($restaurantDetail[0])){
                $request->session()->put('id',$id);
                $restaurantDetail=$restaurantDetail[0];
                $request->session()->put('image',$restaurantDetail->image);
            }
        }else{
            return redirect()->route('users.index')->with('msg','Nhà hàng không tồn tại');
        }

        return view('clients.edit',compact('title','restaurantDetail'));
    }

    public function postEdit(Request $request){
        $id=session('id');

        if(empty($id)){
            return back()->with('msg', 'Not Found!');
        }

        $request->validate([
            'fullname'=> ['required','unique:restaurant,fullname,'.$id],
            'phone' => ['required','numeric',function($attribute,$value,$fail){
                if(strlen($value)!=10){
                    $fail('SĐT phải đúng 10 số!');
                }
            }],
            'Address' => ['required'],
            // 'image'  => ['required']
        ],[
            'fullname.required' => 'Không được bỏ trống!',
            'fullname.unique' => 'Tên nhà hàng đã tồn tại!',
            'phone.required' => 'Không được bỏ trống!',
            'Address.required' => 'Không được bỏ trống!',
            'phone.numeric' =>'Vui lòng nhập lại SĐT',
            // 'image.required' => 'Không được bỏ trống!'
        ]);

        $dataUpdate=[
            $request->fullname,
            $request->phone,
            $request->Address,
            $request->image ?? session('image'),
            date('Y-m-d H:i:s')
        ];
        // dd($dataUpdate);
        $this->restaurants->updateData($dataUpdate,$id);

        return back()->with('msg','Edit thành công');
    }

    public function Delete($id=0){
        if(!empty($id)){
            $restaurantDetail=$this->restaurants->getDetail($id);
            if(!empty($restaurantDetail[0])){
               $this->restaurants->deleteData($id);
            }
        }else{
            return redirect()->route('users.index')->with('msg','Nhà hàng không tồn tại');
        }
        return redirect()->route('users.index')->with('msg','Delete thành công');
    }

    public function More(Request $request,$id=0){
        $title='Chi tiét nhà hàng';

        // $id=session('id');
        if(!empty($id)){
            $restaurantDetail=$this->restaurants->getDetail($id);
            if(!empty($restaurantDetail[0])){
                $restaurantDetail=$restaurantDetail[0];
                $request->session()->put('image',$restaurantDetail->image);
            }
        }else{
            return redirect()->route('users.index')->with('msg','Nhà hàng không tồn tại');
        }
        return view('clients.more',compact('title','restaurantDetail'));
    }

}
