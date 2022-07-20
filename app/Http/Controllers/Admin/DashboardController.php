<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Twilio\Rest\Client;

// use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        parent::__construct();
    }

    public function index()
    {
        $phone_number = "+919624810855";
        $sms = "User registration successful!!";
        $this->sendMessage($sms, $phone_number);
        return view('admin.dashboard');
    }

    private function sendMessage($message, $recipients)
    {
        // $account_sid = env("TWILIO_SID");
        // $auth_token = env("TWILIO_AUTH_TOKEN");
        // $twilio_number = env("TWILIO_NUMBER");
        $account_sid = "AC25a1224c3acc5ec107b37b802d432081";
        $auth_token = "56101ec8d30ea1a6ca5844b3ab494457";
        $twilio_number = "+916354800439";
        // $twilio = new Client($account_sid, $auth_token);
        // $incoming_phone_number = $twilio->incomingPhoneNumbers->create([
        //     "phoneNumber" => "+15005550006",
        //     "voiceUrl" => "http://demo.twilio.com/docs/voice.xml",
        // ]
        // );
        // print($incoming_phone_number->sid);

        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, ['from' => $twilio_number, 'body' => $message]);
        echo '<pre>';
        print_r($client);
        echo '<pre>';
        dd();

    }
}
