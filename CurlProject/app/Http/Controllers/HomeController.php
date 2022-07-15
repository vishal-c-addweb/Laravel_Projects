<?php
namespace App\Http\Controllers;

use Ixudra\Curl\Facades\Curl;

class HomeController extends Controller
{
    public function getData()
    {
        // $response = Curl::to('https://jsonplaceholder.typicode.com/users/1')
        //     ->get();
        try {
            $url = "https://addwebchat.addwebprojects.com/api/v1/chat.postMessage";
            $token = Curl::to(\Config::get('rocket.serveruri').'/oauth/token') 
                ->withHeaders(array( 'Content-type:application/json'))
                ->withData( array('refresh_token' => $user->rocket_refresh_token, 'grant_type' => 'refresh_token', 'client_id' => Config::get("rocket.rocketkey"),  'client_secret' => Config::get('rocket.rocketsecreat')) )
                ->asJson()
                ->post();
            $rocket = Curl::to($url)
                ->withHeaders(array('Authorization: Bearer ' . '39c882d46e5033747623e5b6733b2ee788436aaf', 'Content-type:application/json'))
                ->withData(array('channel' => 'ticktalk.bot', 'text' => 'test message'))
                ->asJson()
                ->post();
            dd($rocket);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
