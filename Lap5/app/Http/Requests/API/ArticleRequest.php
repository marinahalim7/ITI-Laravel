<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string> 
     */
    public function rules(): array
    {
        return [
            'title'=>'required',
            'description'=>'required',
            'rate'=>'required',
            'user_id'=>'required',
           // 'image'=>'required',
          
        ];
    }
    protected function failedValidation(Validator $validator)
    {
       
            throw new HttpResponseException(response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422));
        

       
    }



    
}
