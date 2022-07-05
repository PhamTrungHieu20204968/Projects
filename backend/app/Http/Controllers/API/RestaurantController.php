<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    //

    public function index(){
        $restaurants = Restaurant::all();
        return response()->json([
            'status' => 200,
            'restaurants' => $restaurants,
        ]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required|max:191',
            'phone' => 'required|max:10|min:10',
            'image' => 'required|max:191',
            'detail' => 'required|max:1000',
        ]);

        if($validator->fails()){
            return response()->json([
                'validate_err' => $validator->messages(),
            ]);       
        }else{
        
        $restaurant= new Restaurant;
        $restaurant->name= $request->input('name');
        $restaurant->phone= $request->input('phone');
        $restaurant->image= $request->input('image');
        $restaurant->detail= $request->input('detail');

        $restaurant->save();

        return response()->json([
            'status' => 200,
            'message' => 'Thêm thành công',
        ]);
        }   
    }

    public function edit($id){
        $restaurant = Restaurant::find($id);
        if($restaurant){
            return response()->json([
                'status' => 200,
                'restaurant' => $restaurant,
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No restaurant ID found',
            ]);
        }
       
    }

    public function update(Request $request,$id){

        $validator = Validator::make($request->all(),[
            'name' => 'required|max:191',
            'phone' => 'required|max:10|min:10',
            'image' => 'nullable|max:191',
            'detail' => 'required|max:1000',
        ]);

        if($validator->fails()){
            return response()->json([
                'validate_err' => $validator->messages(),
            ]);       
        }else{
        $restaurant = Restaurant::find($id);
        if($restaurant){
                $restaurant->name= $request->input('name');
                $restaurant->phone= $request->input('phone');
                $restaurant->image= $request->input('image');
                $restaurant->detail= $request->input('detail');
                
                $restaurant->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'Edit thành công',
                ]);
            }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'No restaurant ID found',
                ]);
            }
        }   
    }
    
    public function delete($id){
        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Delete thành công',
        ]);
    }

    public function more($id){
        $restaurant = Restaurant::find($id);
        if($restaurant){
            return response()->json([
                'status' => 200,
                'restaurant' => $restaurant,
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No restaurant ID found',
            ]);
        }
    }
}
