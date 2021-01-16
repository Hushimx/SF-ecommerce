<?php

namespace App\Http\Controllers\Front;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderTrack;
use App\Models\Product;
use App\Models\User;
use App\Models\UserNotification;
use App\Models\VendorOrder;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaylinkPaymentController extends Controller
{
    public function store(Request $request)
    {

        if ($request->pass_check) {
            $users = User::where('email', '=', $request->personal_email)->get();
            if (count($users) == 0) {
                if ($request->personal_pass == $request->personal_confirm) {
                    $user = new User;
                    $user->name = $request->personal_name;
                    $user->email = $request->personal_email;
                    $user->password = bcrypt($request->personal_pass);
                    $token = md5(time() . $request->personal_name . $request->personal_email);
                    $user->verification_link = $token;
                    $user->affilate_code = md5($request->name . $request->email);
                    $user->save();
                    Auth::guard('web')->login($user);
                } else {
                    return redirect()->back()->with('unsuccess', "Confirm Password Doesn't Match.");
                }
            } else {
                return redirect()->back()->with('unsuccess', "This Email Already Exist.");
            }
        }

        if (!Session::has('cart')) {
            return redirect()->route('front.cart')->with('success', "You don't have any product to checkout.");
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }
        foreach ($cart->items as $key => $prod) {
            if (!empty($prod['item']['license']) && !empty($prod['item']['license_qty'])) {
                foreach ($prod['item']['license_qty'] as $ttl => $dtl) {
                    if ($dtl != 0) {
                        $dtl--;
                        $produc = Product::findOrFail($prod['item']['id']);
                        $temp = $produc->license_qty;
                        $temp[$ttl] = $dtl;
                        $final = implode(',', $temp);
                        $produc->license_qty = $final;
                        $produc->update();
                        $temp =  $produc->license;
                        $license = $temp[$ttl];
                        $oldCart = Session::has('cart') ? Session::get('cart') : null;
                        $cart = new Cart($oldCart);
                        $cart->updateLicense($prod['item']['id'], $license);
                        Session::put('cart', $cart);
                        break;
                    }
                }
            }
        }
        $settings = Generalsetting::findOrFail(1);
        $order = new Order;
        //$paypal_email = $settings->paypal_business;
        $settingV = array(
            "apiId" => "APP_ID_1123453311", // Data model to send to login using Merchant API account
            "persistToken" => false, //This is boolean value. if set to true, then the returned token valid for 30 hours. Otherwise, the returned token will be valid for 30 minutes.
            "secretKey" => "0662abb5-13c7-38ab-cd12-236e58f43766"
            //This secret key and must be saved in a secure place and must not be exposed outside the server side of the merchant system.
            // Secret key is given by Paylink. If you need the SECRET KEY, send request for Merchant API account to email info@paylink.sa
        );
        //$success_url = action('Front\PaylinkPaymentController@payreturn');
        $item_name = $settings->title . " Order";
        $item_amount = $request->total / $curr->value;

        //$order['pay_amount'] = round($item_amount / $curr->value, 2)  + $request->shipping_cost + $request->packing_cost;


        $order['currency_sign'] = $curr->sign;
        $order['currency_value'] = $curr->value;

        if ($order['currency_sign'] == "S.R") {
            $order['pay_amount'] = $request->total;
        } elseif ($order['currency_sign'] == "$") {
            $order['pay_amount'] = $request->total * 3.75;
        } elseif ($order['currency_sign'] == "€"){
            $order['pay_amount'] = $request->total * 4.52834;
        }else{
            return redirect()->back()->with('unsuccess',"currency value Doesn't Match.");
        }



        function GetToken($e)
        {
            //global $setting;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'restpilot.paylink.sa/api/auth',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($e),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $response = json_decode($response, true);
            return $response['id_token'];
        }



        function Addinv($token, $order)
        {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'restpilot.paylink.sa/api/addInvoice',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
                "amount": ' . $order['pay_amount']  . ',
                "callBackUrl": "https://www.example.com",
                "clientEmail": "myclient@email.com",
                "clientMobile": "0509200900",
                "clientName": "Zaid Matooq",
                "note": "This invoice is for VIP client.",
                "orderNumber": "MERCHANT-ANY-UNIQUE-ORDER-NUMBER-12313123",
                "products": [
                    {
                        "description": "Brown Hand bag leather for ladies",
                        "imageSrc": "http://merchantwebsite.com/img/img1.jpg",
                        "price": 150,
                        "qty": 1,
                        "title": "Hand bag"
                    }
                ]
            }',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $token . '',
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $response = json_decode($response, true);
            return $response;
        }














        $backcall = Addinv(GetToken($settingV), $order);
        return redirect($backcall['url']);
    }


    public function payreturn()
    {
    }
}
