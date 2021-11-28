<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalHttp\HttpException;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;



class CheckoutController extends Controller
{
    //

    protected function getPayPalClient(){
        $environment = new SandboxEnvironment(config('services.paypal.client_id'), config('services.paypal.secret'));
        $client = new PayPalHttpClient($environment);
        return $client;
    }
    public function checkout()
    {

        $client = $this->getPayPalClient();
        $request = new OrdersCreateRequest();


        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => "test_ref_id1", // reference -> orderid
                "amount" => [
                    "value" => "100.00", // order value
                    "currency_code" => "USD"
                ]
            ]],
            "application_context" => [
                "cancel_url" => url(route('paypal.cancel')),
                "return_url" => url(route('paypal.return')),
            ]
        ];


        try {
            // Call API with your client and get a response for your call

            $response = $client->execute($request);

            if($response->statusCode == 201){
                session()->put('paypal_order_id',$response->result->id);
                foreach($response->result->links as $link){
                    if($link->rel == "approve") {
                    return redirect()->away($link->href);
                    }
                }
            }


            // If call returns body in response, you can get the deserialized version from the result attribute of the response

        } catch ( Exception $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }

    public function paypalReturn()
    {

        // Here, OrdersCaptureRequest() creates a POST request to /v2/checkout/orders
        // $response->result->id gives the orderId of the order created above
        $client = $this->getPayPalClient();
        $id = session()->get('paypal_order_id');

        $request = new OrdersCaptureRequest($id);
        $request->prefer('return=representation');

        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);

            // If call returns body in response, you can get the deserialized version from the result attribute of the response

            if ($response->result->status == "COMPLETED") {

            // Complete the checkout process store (id , volue , user , order )in database

            }

        } catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }


    public function paypalCancel()
    { }
}
