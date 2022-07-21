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

        // $request = new HttpRequest();
        // $request->setUrl('http://openapi.airtel.in/gateway/airtel-iq-sms-utility/sendSingleSms');
        // $request->setMethod(HTTP_METH_GET);

        // $request->setQueryData([
        //     'customerId' => 'SOME_STRING_VALUE',
        //     'destinationAddress' => 'SOME_STRING_VALUE',
        //     'dltTemplateId' => 'SOME_STRING_VALUE',
        //     'entityId' => 'SOME_STRING_VALUE',
        //     'filterBlacklistNumbers' => 'SOME_BOOLEAN_VALUE',
        //     'message' => 'SOME_STRING_VALUE',
        //     'messageType' => 'SOME_STRING_VALUE',
        //     'metaMap' => 'SOME_OBJECT_VALUE',
        //     'priority' => 'SOME_BOOLEAN_VALUE',
        //     'sourceAddress' => 'SOME_STRING_VALUE',
        // ]);

        // $request->setHeaders([
        //     'content-type' => 'application/json',
        // ]);

        // try {
        //     $response = $request->send();

        //     echo $response->getBody();
        // } catch (HttpException $ex) {
        //     echo $ex;
        // }

        return view('admin.dashboard');
    }

    private function sendMessage($message, $recipients)
    {
        // $account_sid = env("TWILIO_SID");
        // $auth_token = env("TWILIO_AUTH_TOKEN");
        // $twilio_number = env("TWILIO_NUMBER");
        // $account_sid = "AC25a1224c3acc5ec107b37b802d432081";
        // $auth_token = "56101ec8d30ea1a6ca5844b3ab494457";
        // $twilio_number = "+916354800439";

        $account_sid = "AC8a606d22e859bc8fa85b3b1799472960";
        $auth_token = "986e0be144880b10870ccfa94aa574d7";
        $twilio_number = "+19852384520";
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
