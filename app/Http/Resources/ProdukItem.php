<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdukItem extends JsonResource
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
        /*
        'sku',
        'name',
        'description',
        'cover',
        'quantity',
        'price',
        'brand_id',
        'status',
        'weight',
        'mass_unit',
        'status',
        'sale_price',
        'length',
        'width',
        'height',
        'distance_unit',
        'slug',
        */
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'name' => $this->name,
            'description' => $this->description,
            'cover' => $this->cover,
            'quantity' => $this->quantity, 
            'price' => $this->price,
            'brand_id' => $this->brand_id,
            'status' => $this->status,
            'weight' => $this->weight,
            'mass_unit' => $this->mass_unit,
            'sale_price' => $this->sale_price, 
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'distance_unit' => $this->distance_unit,
            'slug' => $this->slug 
        ];
    }
}
