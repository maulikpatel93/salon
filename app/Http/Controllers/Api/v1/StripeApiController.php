<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\UnsecureException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StripeRequest;
use App\Http\Requests\Api\StripeSetupRequest;
// use App\Models\Api\Stripe;
use App\Models\Api\Users;
use Illuminate\Http\Request;
use Validator;

class StripeApiController extends Controller
{
    protected $successStatus = 200;
    protected $badrequestStatus = 400;
    protected $errorStatus = 422;
    protected $unauthorizedStatus = 401;
    protected $warningStatus = 410;
    protected $field = [

    ];

    protected $salon_field = [
        'id',
        'business_name',
    ];

    public function __construct()
    {
        $this->middleware('auth:api');
        parent::__construct();
    }

    public function view(Request $request)
    {
        $requestAll = $request->all();
        $id = $request->id;
        return $this->returnResponse($request, $id);
    }
    public function setup(StripeSetupRequest $request)
    {
        $requestAll = $request->all();
        $country = $request->country;
        $email = $request->email;
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $account = $stripe->accounts->create([
            'type' => 'custom',
            'country' => $country ? $country : 'AU',
            'email' => $email,
            'capabilities' => [
                'card_payments' => ['requested' => true],
                'transfers' => ['requested' => true],
            ],
        ]);
        if ($account) {
            $createLink = $stripe->accountLinks->create(
                [
                    'account' => $account->id,
                    'refresh_url' => 'http://localhost:3000/reauth',
                    'return_url' => 'http://localhost:3000/return',
                    'type' => 'account_onboarding',
                ]
            );
            Users::where('id', auth()->user()->id)->update(['stripe_account_id' => $account->id, 'payment_mode' => 'Test']);
            return response()->json(['stripeAccountLink' => $createLink, 'stripe_account_id' => $account->id, 'message' => __('messages.success')], $this->successStatus);
        }

        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }
    public function customerCreate(Request $request)
    {
        $requestAll = $request->all();
        $validator = Validator::make($requestAll, [
            'client_id' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->passes()) {
            $client_id = $request->client_id;
            $country = $request->country;
            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $address = $request->address;
            $description = $request->description;
            $addressData = [
                'line1' => '',
                'line2' => '',
                'postal_code' => '',
                'city' => '',
                'state' => '',
                'country' => '',
            ];
            if ($address) {
                $addressData = [
                    'line1' => isset($address['line1']) && $address['line1'] ? $address['line1'] : "",
                    'line2' => isset($address['line2']) && $address['line2'] ? $address['line2'] : "",
                    'postal_code' => isset($address['postal_code']) && $address['postal_code'] ? $address['postal_code'] : "",
                    'city' => isset($address['city']) && $address['city'] ? $address['city'] : "",
                    'state' => isset($address['state']) && $address['state'] ? $address['state'] : "",
                    'country' => isset($address['country']) && $address['country'] ? $address['country'] : "",
                ];
            }
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $customer = $stripe->customers->create(
                [
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $addressData,
                    'description' => $description,
                ]
            );
            if ($customer) {
                Users::where('id', $client_id)->update(['stripe_customer_account_id' => $customer->id]);
                return response()->json(['stripe_customer_account_id' => $customer->id, 'message' => __('messages.success')], $this->successStatus);
            }
        }
        return response()->json(['message' => __('messages.failed')], $this->errorStatus);
    }

    public function store(StripeRequest $request)
    {
        $requestAll = $request->all();
        $country = $request->country;

        //Create token
        $stripe = new \Stripe\StripeClient(
            'sk_test_51Ko2rOSFsrov7HTSJAkhuTXyQiUGw5kfiU67lVR7riELEoXvcoUI6duFWM6djjYVNwmvGMec5OhyVeZyy5X3eRcj00r1l2zaoX'
        );
        $token = $stripe->tokens->create([
            'card' => [
                'number' => '4000003560000008',
                'exp_month' => 12,
                'exp_year' => 2034,
                'cvc' => '567',
            ],
        ]);
        $customer = $stripe->customers->create(
            [
                'name' => 'Jenny Rosen',
                'address' => [
                    'line1' => '510 Townsend St',
                    'postal_code' => '98140',
                    'city' => 'San Francisco',
                    'state' => 'CA',
                    'country' => 'US',
                ],
                // "source" => $token->id,
            ]
        );
        $paymentMethods = $stripe->paymentMethods->create([
            'type' => 'card',
            'card' => [
                'number' => '4242424242424242',
                'exp_month' => 4,
                'exp_year' => 2023,
                'cvc' => '314',
            ],
        ]);
        $customerattach = $stripe->paymentMethods->attach(
            $paymentMethods->id,
            ['customer' => $customer->id]
        );
        $source = $stripe->customers->createSource(
            $customer->id,
            ['source' => $token]
        );
        echo '<pre>';
        print_r($source);
        echo '<pre>';
        dd();
        if ($token) {
            // Set your secret key. Remember to switch to your live secret key in production.
            // See your keys here: https://dashboard.stripe.com/apikeys
            \Stripe\Stripe::setApiKey(
                'sk_test_51Ko2rOSFsrov7HTSJAkhuTXyQiUGw5kfiU67lVR7riELEoXvcoUI6duFWM6djjYVNwmvGMec5OhyVeZyy5X3eRcj00r1l2zaoX'
            );

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
            // $token = $_POST['stripeToken'];

            // $charge = \Stripe\Charge::create([
            //     'amount' => 999,
            //     'currency' => 'AUD',
            //     'description' => 'Example charge',
            //     'source' => $token->id,
            //     'statement_descriptor' => 'Custom descriptor',
            // ]);

            echo '<pre>';
            print_r($token);
            print_r($customer);
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => 999,
                'currency' => 'aud',
                'payment_method_types' => ['card'],
                // 'automatic_payment_methods' => [
                //     'enabled' => true,
                // ],
            ], [
                'stripe_account' => auth()->user()->stripe_account_id,
            ]);
            // $retrieve = $stripe->paymentIntents->retrieve(
            //     $paymentIntent->id,
            //     [
            //         'stripe_account' => auth()->user()->stripe_account_id,
            //     ]
            // );

            // $update = $stripe->paymentIntents->update(
            //     $retrieve->id,
            //     ['metadata' => ['order_id' => '6735']]
            // );

            // $confirm = $stripe->paymentIntents->confirm(
            //     $retrieve->id,
            //     ['payment_method' => 'pm_card_visa']
            // );

            // $capture = $stripe->paymentIntents->capture(
            //     'pi_3Klq5m2eZvKYlo2C0NCcZ8Yd',
            //     []
            // );
            // $stripe = new \Stripe\StripeClient(
            //     'sk_test_51Ko2rOSFsrov7HTSJAkhuTXyQiUGw5kfiU67lVR7riELEoXvcoUI6duFWM6djjYVNwmvGMec5OhyVeZyy5X3eRcj00r1l2zaoX'
            // );
            // $retrieveIntent = $stripe->paymentIntents->retrieve(
            //     $paymentIntent->id,
            //     [
            //         'stripe_account' => auth()->user()->stripe_account_id,
            //     ]
            // );
            echo "<br>indent";
            print_r($paymentIntent);
            // echo "<br>retrieve";
            // print_r($retrieve);
            // echo "<br>update";
            // print_r($update);
            // echo "<br>confirm";
            // print_r($confirm);
            // echo "<br>capture";
            // print_r($capture);
            dd();
        }

        //Create account link
        // $stripe->accountLinks->create([
        //     'account' => 'acct_1032D82eZvKYlo2C',
        //     'refresh_url' => 'https://example.com/reauth',
        //     'return_url' => 'https://example.com/return',
        //     'type' => 'account_onboarding',
        //   ]);
        //acct_1Ko4ITSECnbloceR
        // Create a PaymentIntent with amount and currency

        // $session = \Stripe\Checkout\Session::create([
        //     'line_items' => [[
        //         'price' => 100
        //         ,
        //         'quantity' => 1,
        //     ]],
        //     'mode' => 'payment',
        //     'success_url' => 'https://example.com/success',
        //     'cancel_url' => 'https://example.com/failure',
        //     'payment_intent_data' => [
        //         'application_fee_amount' => 123,
        //         'transfer_data' => [
        //             'destination' => 'acct_1Ko4ITSECnbloceR'
        //             ,
        //         ],
        //     ],
        // ]);

        // $charge = \Stripe\Charge::create([
        //     'amount' => 1000,
        //     'currency' => 'usd',
        //     'customer' => 'cus_AFGbOSiITuJVDs',
        //     'source' => 'src_18eYalAHEMiOZZp1l9ZTjSU0',
        // ]);

        echo '<pre>';
        print_r($session);
        echo '<pre>';

        echo '<pre>';
        print_r($account);
        echo '<pre>';
        dd();
        $requestAll['is_active_at'] = currentDateTime();
        $requestAll['away'] = isset($requestAll['away']) && $requestAll['away'] ? '1' : '0';
        $model = new Stripe;
        $model->fill($requestAll);
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    public function update(StripeRequest $request, $id)
    {
        $requestAll = $request->all();
        $model = $this->findModel($id);
        $model->fill($requestAll);
        $model->save();
        return $this->returnResponse($request, $model->id);
    }

    public function delete(Request $request, $id)
    {
        $requestAll = $request->all();
        Stripe::where('id', $id)->delete();
        return response()->json(['id' => $id, 'message' => __('messages.success')], $this->successStatus);
    }

    protected function findModel($id)
    {
        if (($model = Stripe::find($id)) !== null) {
            return $model;
        }
        throw new UnsecureException('The requested page does not exist.');
    }

}