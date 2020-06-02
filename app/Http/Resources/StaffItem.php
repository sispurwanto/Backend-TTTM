<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StaffItem extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'staff_name' => $this->staff_name,
            'staff_hp' => $this->staff_hp,
            'staff_alamat' => $this->staff_alamat,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at 
        ];
    }
}
