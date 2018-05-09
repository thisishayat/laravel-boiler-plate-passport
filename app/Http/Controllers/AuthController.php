<?php
/**
 * Created by PhpStorm.
 * User: backend
 * Date: 3/5/18
 * Time: 6:25 PM
 */

namespace App\Http\Controllers;



use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController
{
    public function signUp(Request $request){
        User::create([
            'email'=>$request->get('email'),
            'password'=>bcrypt($request->get('password')),
        ]);
    }

    public function login( Request $request ) {

        $username = $request->input( 'username' );

        if ( filter_var( $username, FILTER_VALIDATE_EMAIL ) ) {
            Auth::attempt( [ 'email' => $username, 'password' => $request->password ] );
        } else if ( filter_var( $username, FILTER_VALIDATE_INT ) ) {
            Auth::attempt( [ 'mobile' => $username, 'password' => $request->password ] );
        } else {
            Auth::attempt( [ 'username' => $username, 'password' => $request->password ] );
        }

        // if validated
        if ( Auth::check() ) {

            $user               = Auth::user();
            //dd($user);
            $client_name        = $request->header( 'Client' );
            $success[ 'token' ] = $user->createToken( $client_name )->accessToken;

            return response()->json( [ 'success' => $success ], 200 );

        } else {

            return response()->json( [ 'error' => 'Unauthorized' ], 401 );

        }

    }

}