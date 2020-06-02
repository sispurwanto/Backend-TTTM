<?php

namespace App\Shop\Brands;

use App\Shop\Products\Product;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];

    //protected $table = 'brands';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
        //return $this->belongsTo(Product::class);
    }
}
