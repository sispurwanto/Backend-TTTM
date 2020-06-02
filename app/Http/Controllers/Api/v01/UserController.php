<?php

namespace App\Http\Controllers\Api\v01;

use Illuminate\Http\Request;

use App\Shop\Customers\Customer;
use App\Http\Controllers\Controller;
use App\Http\Resources\LoginItem;

class UserController extends Controller
{

    public function register(Request $request, Customer $customer)
    {
        $this->validate($request,[
            'name'      => 'required',
            'email'     => 'required|email|unique:customers',
            'password'  => 'required|string|min:6',
        ]);

        /*$customer = $this->customerRepo->createCustomer($request->except('_method'));
        
        return (new LoginItem($customer))->additional(
            ['meta' => [
                'token' => $currentUser->api_token,
            ]
        ]);*/
        
    }

}

?>
