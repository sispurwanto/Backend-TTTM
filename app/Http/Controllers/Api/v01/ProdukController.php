<?php

namespace App\Http\Controllers\Api\v01;

use App\Shop\Attributes\Repositories\AttributeRepositoryInterface;
use App\Shop\AttributeValues\Repositories\AttributeValueRepositoryInterface;
use App\Shop\Brands\Repositories\BrandRepositoryInterface;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\ProductAttributes\ProductAttribute;
use App\Shop\Products\Exceptions\ProductInvalidArgumentException;
use App\Shop\Products\Exceptions\ProductNotFoundException;
use App\Shop\Products\Product;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Products\Repositories\ProductRepository;
use App\Shop\Products\Requests\CreateProductRequest;
use App\Shop\Products\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Shop\Products\Transformations\ProductTransformable;
use App\Shop\Tools\UploadableTrait;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\ProdukCollection;
use App\Http\Resources\ProdukItem;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ProdukCollection(Product::get());
        /*$data = Staff::get();

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Success!";
            $res['values'] = $data;
            //return response($res);
            //return json_encode($res);
            return response()->json($res);
        }
        else{
            $res['message'] = "Empty!";
            //return response($res);
            //return json_encode($res);
            return response()->json($res);
        }*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*$sukses = Staff::create([
                'staff_name' => $request->input('nama'),
                'staff_hp' => $request->input('hp'),
                'staff_alamat' => $request->input('alamat'),
                ]);

        if ($sukses) {
            $response['pesan'] = 'insert berhasil';
            $response['status'] = 200;
          } else {
            $response['pesan'] = 'insert error';
            $response['status'] = 404;
          }
          return json_encode($response);*/

          //$this->validate($request, Product::rules(false));

        if (!Product::create($request->all())) {
            return [
                'message' => 'Bad Request',
                'code' => 400,
            ];
        } else {
            return [
                'message' => 'OK',
                'code' => 200,
            ];
        }
        return new ProdukCollection(Product::get());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $produk)
    {
        /*$data = Staff::findOrFail($id);
        $res['values'] = $data;
        return json_encode($res);*/
        return new ProdukItem($produk);
    }
    
}
