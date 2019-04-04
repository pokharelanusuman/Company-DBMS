<?php

namespace App\Http\Requests;

use App\User;
use App\roles;
use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
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
        $this->role = strtolower($this->role);
        if($this->isMethod('PUT'))
        {
            // dd('update ko lagi');
            //update
            $oldData = roles::findOrFail($this->id);
            if($oldData)
            {
                if($oldData->role == $this->role)
                {
                    //role is same
                    return [
                        'role' => ['required', 'string', 'min:3', 'max:50'],
                        'authLevel' => ['sometimes', 'integer'],
                        'status' => ['sometimes', 'integer'],
                    ];
                }else{
                    //role has changed
                    return [
                        'role' => ['required', 'string', 'min:3', 'max:50', 'unique:roles'],
                        'authLevel' => ['sometimes', 'integer'],
                        'status' => ['sometimes', 'integer'],
                    ];
                }
            }

        }else{
            // dd('add ko lagi');
            //create new
            return [
                'role' => ['required', 'string', 'min:3', 'max:50', 'unique:roles'],
                'authLevel' => ['sometimes', 'integer'],
                'status' => ['sometimes', 'integer'],
            ];
        }
        
    }
}
