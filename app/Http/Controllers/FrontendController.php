<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Ixudra\Curl\Facades\Curl;

class FrontendController extends Controller
{
    public function login(){

        return view('login');
    }

    public function login_submit(Request $request){
        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);
        $data_array =  array(
            "email"        => $request->email,
            "password"      => $request->password,
            "token"      => $token,
        );
        $response=Curl::to(config('apiurl.api_url').'login')
            ->withData ($data_array)
            ->post();
         $response=json_decode($response);

         if($response->message == 'error'){
             Session::flash('error','Invalid Credential');
             return redirect()->back();
         }else{
             Session::put('users',$response->users);
             Session::put('token',$token);
             return redirect('/');
         }

    }

    public function registration(){

        return view('registeration');

    }

    public function registration_submit(Request $request){
        $response=Curl::to(config('apiurl.api_url').'registeration')
            ->withData ($request->all())
            ->post();
        $response=json_decode($response);
        if($response->message == 'error'){
            Session::flash('error','Input Not valid');
            return redirect()->back();

        }else{
            Session::flash('success','Send code in your mail');
            return redirect('email_verify_code_view');
        }

    }

    public function email_verify_code_view(Request $request){

        return view('email_verify_code_view');

    }


    public function email_verify_code(Request $request){

        $response=Curl::to(config('apiurl.api_url').'email_verify_code')
            ->withData ($request->all())
            ->post();
        $response=json_decode($response);
        if($response->message == 'error'){
            Session::flash('error','Code Not valid');
            return redirect()->back();

        }else{
            return redirect('/');
        }
    }

    public function email_check_view(){

        return view('email_check');


    }

  public function email_check(Request $request){

        $response=Curl::to(config('apiurl.api_url').'email_check')
            ->withData ($request->all())
            ->post();
      $response=json_decode($response);
      if($response->message == 'error'){
          Session::flash('error','Email Not valid');
          return redirect()->back();

      }else{
          Session::put('users',$response->users);
          return redirect('password_verify');
      }

    }



    public function password_verify(){

        return view('password_verify');

    }

  public function password_verify_code(Request $request){
      $response=Curl::to(config('apiurl.api_url').'password_verify_code')
          ->withData ($request->all())
          ->post();
      $response=json_decode($response);
      if($response->message == 'error'){
          Session::flash('error','Code Not valid');
          return redirect()->back();

      }else{
          Session::put('users',$response->users);
          return redirect('change_password_view');
      }

    }

  public function change_password_view(){

      return view('change_password');

    }

  public function change_password(Request $request){

      $response=Curl::to(config('apiurl.api_url').'change_password')
          ->withData ($request->all())
          ->post();
      $response=json_decode($response);
      if($response->message == 'error'){
          return redirect()->back();

      }else{
          Session::flash('success','Password Successfully Changed');
          return redirect('/');
      }
    }


    public function logout(){
        Session::forget('users');
        Session::forget('token');
        return redirect('/');

    }


}
