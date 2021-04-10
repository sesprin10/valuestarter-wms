<?php

namespace App\Http\Controllers\Auth;

use App\Config\Constants;
use App\Config\Globals;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'max:128']
        ]);

        if($validation->fails())
            return redirect()->back()->withInput()->with(['validation_errors' => $validation->errors()->messages()]);

        $params = [
            'email' => $request->post('email'),
            'password' => $request->post('password')
        ];

        $response = json_decode(Globals::send_post_request(Constants::API_URL_TOKEN, $params), true);

        if (isset($response['non_field_errors']) && $response['non_field_errors'][0] === 'Unable to authenticate with provided credentials')
            return redirect()->back()->withInput()->with(['validation_errors' => ['all' => ['The data you entered did not match our records.']]]);
        else if (isset($response['token']))
        {
            \session(['token' => $response['token']]);
            return redirect(route('dashboard.index'));
        }

        return null;
    }

    public function register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'max:128', 'confirmed']
        ]);

        if($validation->fails())
            return redirect()->back()->withInput()->with(['validation_errors' => $validation->errors()->messages()]);

        $params = [
            'email' => $request->post('email'),
            'password' => $request->post('password'),
            'name' => $request->post('name')
        ];

        $response = json_decode(Globals::send_post_request(Constants::API_URL_REGISTER, $params), true);

        if ($response['email'][0] === 'user with this email already exists.')
            return redirect()->back()->withInput()->with(['validation_errors' => ['email' => [__('User with this email already exists.')]]]);

        $params = [
            'email' => $request->post('email'),
            'password' => $request->post('password')
        ];

        echo Globals::send_post_request(Constants::API_URL_TOKEN, $params);
        return redirect(route('dashboard.index'));
    }
}
