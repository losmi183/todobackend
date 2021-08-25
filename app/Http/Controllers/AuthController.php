<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) 
    {
        $http = new \GuzzleHttp\Client;

        $res = $http->get('nginx');

        return $res;

        $response = $http->post('172.29.159.255/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 2,
                'client_secret' => 'vKK3HA0Ic80yzwoT1i7OB8Wb1tMdQ0sJfbFdsslh',
                'username' => $request->username,
                'password' => $request->password
            ]
        ]);
        return $response->getBody();
        try {
        } 
        catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() == 400) {
                return response()->json('Invalid Request. Please Enter a username or a password.', $e->getCode());
            } 
            else if ($e->getCode() == 401) {
                return response()->json('Your credential are incorrect. Please try again.', $e->getCode());
            }

            return response()->json('Something went wrong on the server.', $e->getCode());
        }
    }
}
