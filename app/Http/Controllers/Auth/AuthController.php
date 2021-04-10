<?php

namespace App\Http\Controllers\Auth;

use App\Config\Constants;
use App\Config\Globals;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'max:128', 'confirmed']
        ]);

        $response = $validation->errors()->messages();

        if($validation->fails())
            return redirect()->back()->withInput()->with(['validation_errors' => $response]);

        $params = [
            'email' => $request->post('email'),
            'password' => $request->post('password'),
            'name' => $request->post('name')
        ];

        $response = json_decode(Globals::send_post_request(Constants::API_URL_REGISTER, $params), true);

        if ($response['email'][0] === 'user with this email already exists.')
            return redirect()->back()->withInput()->with(['validation_errors' => ['email' => ['User with this email already exists.']]]);

        $params = [
            'email' => $request->post('email'),
            'password' => $request->post('password')
        ];

        echo Globals::send_post_request(Constants::API_URL_TOKEN, $params);
    }
}
