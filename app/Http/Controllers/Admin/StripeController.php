<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('admin.stripe.stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey("sk_test_51Ko2rOSFsrov7HTSJAkhuTXyQiUGw5kfiU67lVR7riELEoXvcoUI6duFWM6djjYVNwmvGMec5OhyVeZyy5X3eRcj00r1l2zaoX");

        //tok_1KoMaoSFsrov7HTSvuqWvcPn
        $charge = Stripe\Charge::create([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            // "description" => "This payment is tested purpose phpcodingstuff.com",
        ]);
        echo '<pre>';
        print_r($charge);
        echo '<pre>';
        dd();
        Session::flash('success', 'Payment successful!');

        return back();
    }
}