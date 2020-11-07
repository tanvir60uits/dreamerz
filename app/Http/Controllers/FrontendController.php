<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Ixudra\Curl\Facades\Curl;

class FrontendController extends Controller
{
    public function login(){

        $fb = new \Facebook\Facebook([
            'app_id' => '397450144773664',
            'app_secret' => 'd2ae81bbb5aa2cbb4f388e9c038ac351',
            'default_graph_version' => 'v2.10',
        ]);


        $helper = $fb->getRedirectLoginHelper();
		dd($helper);
        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl(url('fb_callback'), $permissions);

        return view('login',compact('loginUrl'));
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
//        $MAC = exec('getmac');
//        dd($MAC);
        try{


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
        }catch (\Exception $e){

            Session::flash('error','Email Already Exist.');
            return redirect()->back();
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

    public function fb_callback(Request $request){
        if(!session_id()) {
            session_start();
        }
        $fb = new \Facebook\Facebook([
            'app_id' => '397450144773664',
            'app_secret' => 'd2ae81bbb5aa2cbb4f388e9c038ac351',
            'default_graph_version' => 'v2.10',
            'persistent_data_handler' => 'session'
            //'default_access_token' => '{access-token}', // optional
        ]);

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
            dd($accessToken);
        } catch(\Facebook\Exception\ResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(\Facebook\Exception\SDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (! isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

// Logged in
        echo '<h3>Access Token</h3>';
        var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        echo '<h3>Metadata</h3>';
        var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId('397450144773664');
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
        $tokenMetadata->validateExpiration();

        if (! $accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exception\SDKException $e) {
                echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
                exit;
            }

            echo '<h3>Long-lived</h3>';
            var_dump($accessToken->getValue());
        }


    }


}
