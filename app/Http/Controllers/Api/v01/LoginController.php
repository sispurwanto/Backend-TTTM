<?php

namespace App\Http\Controllers\Api\v01;

//use App\Shop\Admins\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\Shop\Customers\Customer;
use App\Http\Resources\LoginCollection;
use App\Http\Resources\LoginItem;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Login the admin
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $details = $request->only('email', 'password');
        $details['status'] = 1;
        if (auth()->attempt($details)) {
            //return $this->sendLoginResponse($request);
            $currentUser = auth()->user();
            return (new LoginItem($currentUser))->additional(
                ['meta' => [
                    'token' => $currentUser->api_token,
                ]
            ]);
        }

         return [
                'message' => 'Email atau Password ada yang tidak sesuai!',
                'code' => 401,
            ];
    }

}
