<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Exceptions\HttpResponseException; 

class RestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'fullname'=> ['required','unique:restaurant'],
            'phone' => ['required','numeric',function($attribute,$value,$fail){
                if(strlen($value)!=10){
                    $fail('SĐT phải đúng 10 số!');
                }
            }],
            'Address' => ['required'],
            'image'  => ['required']
        ];
    }

    public function messages(){
        return [
            'fullname.required' => 'Không được bỏ trống!',
            'fullname.unique' => 'Tên nhà hàng đã tồn tại!',
            'phone.required' => 'Không được bỏ trống!',
            'Address.required' => 'Không được bỏ trống!',
            'phone.numeric' =>'Vui lòng nhập lại SĐT',
            'image.required' => 'Không được bỏ trống!'
            
        ];
    }

    protected function withValidator($validator){
        $validator->after(function($validator){
            if($validator->errors()->count()>0){
                $validator->errors()->add('msg','Vui lòng kiểm tra lại dữ liệu!');
            }else{
                
            }
        });
    }

    protected function prepareForValidation()
    {
    $this->merge([
       'create_at'=> date('Y:m:d H:i:s')
    ]);

    }

    protected function failedAuthorization(){
        throw new HttpResponseException(redirect('/')->with('msg','Yêu cầu đăng nhập!'));
    }
}
