<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Staff extends Model
{
	protected $guarded = ['id'];

    protected $table = 'staff';

    public static function rules($update = false, $id = null)
    {
        $rules = [
            'staff_name'    => 'required',
            'staff_hp'    => 'required'
            /*'alamat'    => 'required'
            'email'         => ['required', Rule::unique('colleagues')->ignore($id, 'id')],
            'email'         => 'email',
            'gender'        => ['required', Rule::in(['male', 'female'])],
            'address'       => 'required',
            'phone_number'  => 'required'*/
        ];

        if ($update) {
            return $rules;
        }

        /*return array_merge($rules, [
            'email'         => 'required|unique:colleagues,email',
        ]);*/
        return array_merge($rules);
    }
}
