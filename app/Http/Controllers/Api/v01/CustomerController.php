<?php

namespace App\Http\Controllers\Api\v01;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Shop\Customers\Customer;
use App\Http\Resources\LoginItem;

class CustomerController extends Controller
{
    public function register(Request $request, Customer $customer)
    {
        $this->validate($request,[
            'name'      => 'required',
            'email'     => 'required|email|unique:customers',
            'password'  => 'required|string|min:6',
        ]);

        /*$customer = $this->customerRepo->createCustomer($request->except('_method'));*/
        $customer = $customer->create([
        	'name'		=> $request->name,
        	'email'		=> $request->email,
        	'password'	=> bcrypt($request->password),
        	'api_token' => str_random(60),
        	'status'	=> 1
        ]);
        
        return (new LoginItem($customer))->additional(
            ['meta' => [
                'token' => $customer->api_token,
            ]
        ]);
        
    }
}
