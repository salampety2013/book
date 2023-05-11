<?php

namespace App\Http\Requests;

use App\Rules\Filter;
use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name_en' => 'required|string|min:3|unique:brands,name_en,'.$this->id,
            'name_ar' => 'required|string|min:3|unique:brands,name_ar,'.$this->id,  
             'img' => 'required_without:id|mimes:jpg,jpeg,png',  //without meanThe img field is required when id is not present in edit mode
           // 'is_active' =>'required|in:0,1' //   required  value must be 0 or 1 
         // make custom rules
        /*  function($attribute,$value,$fails){
                if(strtolower($value)=="laravel"){
                    $fails('this name not allowed');
                }
         } ,   */

        // new Filter(['php','laravel','html']),  // for many words
        ];
    }
    
    public function messages()
    {
        return [
//attribute get field name 
            //'requiired'=>'This field (:attribute) is required' ,//all fields The name en field is requireda ,The name ar field is required.
            

            'name_ar.required' => 'هذا الحقل مطلوب',
            'name_en.required' => 'This field (:attribute) is required',
           

            ];
    }
}
