<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;

// use App\Http\Requests\Api\MailchimpRequest;
// use App\Models\Api\Mailchimp;
use Illuminate\Http\Request;
use Validator;

class MailchimpApiController extends Controller
{
    protected $successStatus = 200;
    protected $badrequestStatus = 400;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;

    public function __construct()
    {
        $this->middleware('auth:api');
        parent::__construct();
    }

    public function subscribe(Request $request)
    {
        $requestAll = $request->all();

        $validator = Validator::make($requestAll, [
            'auth_key' => 'required',
            'salon_id' => 'required|integer',
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json(['errors' => $messages, 'message' => __('messages.validation_error')], $this->errorStatus);
        }
        $email = $request->email;
        $postData = array(
            "email_address" => $request->email,
            "status" => "subscribed",
            "merge_fields" => array(
                "FNAME" => $request->name,
                "PHONE" => $request->phone),
        );

        // $email = 'programmer93.dynamicdreamz@gmail.com';
        // $list_id = 'qkXB8X_7nTA';
        // $mandrill_api_key = 'mIfiW1VW5N-qkXB8X_7nTA';
        $email = $request->email;
        $status = 'subscribed';
        $api_key = 'aec792bcfc29c483b3cf231dc079b384-us18';
        $data_center = substr($api_key, strpos($api_key, '-') + 1); //us18
        $u = '738df287faf364f07c3d7433a';
        $list_id = '238f6786b9';

        // "subscribed" or "unsubscribed" or "cleaned" or "pending"
        // $list_id = '238f6786b9'; // where to get it read above
        // $api_key = 'aec792bcfc29c483b3cf231dc079b384-us18'; // where to get it read above
        $merge_fields = array('FNAME' => 'Misha', 'LNAME' => 'Rudrastyh');

        $response = $this->rudr_mailchimp_subscriber_status($email, $status, $list_id, $api_key, $merge_fields);

        echo '<pre>';
        print_r(\json_decode($response, true));
        echo '<pre>';
        dd();

        $get_data = $this->callAPI('GET', 'https://gmail.us18.list-manage.com/subscribe/post-json?u=' . $u . '&amp;id=' . $list_id . '&EMAIL=' . $email, false);
        $response = json_decode($get_data, true);

        $result = isset($response['result']) ? $response['result'] : "";
        if ($result && $result === "success") {
            $successData['message'] = $response['msg'];
            return response()->json($successData, $this->successStatus);
        }
        if ($result && $result === "error") {
            $successData = [
                'errors' => [
                    'email' => [$response['msg']],
                ],
            ];
            return response()->json($successData, $this->errorStatus);
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);

    }

    public function callAPI($method, $url, $data)
    {
        $curl = curl_init();
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }

                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }

                break;
            default:
                if ($data) {
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }

        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'APIKEY: 111111111111111111111',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if (!$result) {die("Connection Failure");}
        curl_close($curl);
        return $result;
    }

    public function rudr_mailchimp_subscriber_status($email, $status, $list_id, $api_key, $merge_fields = array('FNAME' => '', 'LNAME' => ''))
    {
        $data = array(
            'apikey' => $api_key,
            'email_address' => $email,
            'status' => $status,
            'merge_fields' => $merge_fields,
        );
        $mch_api = curl_init(); // initialize cURL connection

        curl_setopt($mch_api, CURLOPT_URL, 'https://' . substr($api_key, strpos($api_key, '-') + 1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($data['email_address'])));
        curl_setopt($mch_api, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic ' . base64_encode('user:' . $api_key)));
        curl_setopt($mch_api, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
        curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
        curl_setopt($mch_api, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
        curl_setopt($mch_api, CURLOPT_TIMEOUT, 10);
        curl_setopt($mch_api, CURLOPT_POST, true);
        curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($mch_api, CURLOPT_POSTFIELDS, json_encode($data)); // send data in json

        $result = curl_exec($mch_api);
        return $result;
    }
}
