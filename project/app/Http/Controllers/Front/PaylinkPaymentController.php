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

        $success_url = action('Front\PaylinkPaymentController@paysuccess');
        $item_name = $settings->title . " Order";
        $item_amount = $request->total / $curr->value;
        $item_number = str_random(4) . time();

        //$order['pay_amount'] = round($item_amount / $curr->value, 2)  + $request->shipping_cost + $request->packing_cost;






        $order['user_id'] = $request->user_id;
        $order['cart'] = utf8_encode(bzcompress(serialize($cart), 9));
        $order['totalQty'] = $request->totalQty;
        // $order['pay_amount'] = round($item_amount / $curr->value, 2)  + $request->shipping_cost + $request->packing_cost;

        if ($curr->sign == "S.R") {
            $order['pay_amount'] = $request->total;
        } elseif ($curr->sign  == "$") {
            $order['pay_amount'] = $request->total * 3.75;
        } elseif ($curr->sign  == "€") {
            $order['pay_amount'] = $request->total * 4.52834;
        } else {
            // return redirect()->back()->with('unsuccess', "currency value Doesn't Match.");
        }

        $order['method'] = $request->method;
        $order['customer_email'] = $request->email;
        $order['customer_name'] = $request->name;
        $order['customer_phone'] = $request->phone;
        $order['order_number'] = $item_number;
        $order['shipping'] = $request->shipping;
        $order['pickup_location'] = $request->pickup_location;
        $order['customer_address'] = $request->address;
        $order['customer_country'] = $request->customer_country;
        $order['customer_city'] = $request->city;
        $order['customer_zip'] = $request->zip;
        $order['shipping_email'] = $request->shipping_email;
        $order['shipping_name'] = $request->shipping_name;
        $order['shipping_phone'] = $request->shipping_phone;
        $order['shipping_address'] = $request->shipping_address;
        $order['shipping_country'] = $request->shipping_country;
        $order['shipping_city'] = $request->shipping_city;
        $order['shipping_zip'] = $request->shipping_zip;
        $order['order_note'] = $request->order_notes;
        $order['coupon_code'] = $request->coupon_code;
        $order['coupon_discount'] = $request->coupon_discount;
        $order['payment_status'] = "Pending";
        $order['currency_sign'] = $curr->sign;
        $order['currency_value'] = $curr->value;
        $order['shipping_cost'] = $request->shipping_cost;
        $order['packing_cost'] = $request->packing_cost;
        $order['tax'] = $request->tax;
        $order['dp'] = $request->dp;

        $order['adapter_name'] = $request->adapter_name;
        $order['transfer_amount'] = $request->transfer_amount;
        $order['transfer_date'] = $request->transfer_date;
        // $order['transaction_id'] = $request->transaction_id;
        if (Session::has('affilate')) {
            $val = $request->total / 100;
            $sub = $val * $settings->affilate_charge;
            $user = User::findOrFail(Session::get('affilate'));
            $user->affilate_income += $sub;
            $user->update();
            $order['affilate_user'] = $user->name;
            $order['affilate_charge'] = $sub;
        }
        //$order->save();



        //$track->save();


        $ite = 0;
        foreach ($cart->items as $key => $prod) {
            $te[$ite]['description'] = "";
            $te[$ite]['imageSrc'] = "http://localhost/SF-ecommerce/assets/images/products/" . $prod['item']['photo'];
            $te[$ite]['price'] = $prod['item']['price'];
            $te[$ite]['qty'] = $prod['qty'];
            $te[$ite]['title'] = $prod['item']['name'];
            $ite++;
        }
        /*
                [
                    {
                        "description": "Brown Hand bag leather for ladies",
                        "imageSrc": "http://merchantwebsite.com/img/img1.jpg",
                        "price": 150,
                        "qty": 1,
                        "title": "Hand bag"
                    }
                ]
                */

        /*
                        function GetToken()
                        {

                            $settingV = array(
                                "apiId" => "APP_ID_1123453311", // Data model to send to login using Merchant API account
                                "persistToken" => false, //This is boolean value. if set to true, then the returned token valid for 30 hours. Otherwise, the returned token will be valid for 30 minutes.
                                "secretKey" => "0662abb5-13c7-38ab-cd12-236e58f43766"
                                //This secret key and must be saved in a secure place and must not be exposed outside the server side of the merchant system.
                                // Secret key is given by Paylink. If you need the SECRET KEY, send request for Merchant API account to email info@paylink.sa
                            );
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
                                CURLOPT_POSTFIELDS => json_encode($settingV),
                                CURLOPT_HTTPHEADER => array(
                                    'Content-Type: application/json'
                                ),
                            ));

                            $response = curl_exec($curl);

                            curl_close($curl);
                            $response = json_decode($response, true);
                            return $response['id_token'];
                        }
                */
        function Addinv($token, $order, $success_url)
        {
            global $te;
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
                "callBackUrl": "' . $success_url . '",
                "clientEmail": "' . $order['customer_email'] . '",
                "clientMobile": "' . $order['customer_phone'] . '",
                "clientName": "' . $order['customer_name'] . '",
                "note": "' . $order['order_note'] . '",
                "orderNumber": "' . $order['order_number'] . '",
                "products": ' . json_encode($te, true) . '
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
        $GetToken = $this->GetToken();

        $backcall = Addinv($GetToken, $order, $success_url);

        if ($backcall['success'] == true) {
            if ($backcall['amount'] == $order['pay_amount']) {
                if ($backcall['orderStatus'] == "CREATED") {
                    if ($backcall['paymentErrors'] == null) {


                        $order['transaction_id'] = $backcall['transactionNo'];

                        $order->save();


                        $track = new OrderTrack;
                        $track->title = 'Pending';
                        $track->text = 'You have successfully placed your order.';
                        $track->order_id = $order->id;
                        $track->save();

                        if ($request->coupon_id != "") {
                            $coupon = Coupon::findOrFail($request->coupon_id);
                            $coupon->used++;
                            if ($coupon->times != null) {
                                $i = (int)$coupon->times;
                                $i--;
                                $coupon->times = (string)$i;
                            }
                            $coupon->update();
                        }





                        foreach ($cart->items as $prod) {
                            $x = (string)$prod['stock'];
                            if ($x != null) {
                                $product = Product::findOrFail($prod['item']['id']);
                                $product->stock =  $prod['stock'];
                                $product->update();
                            }
                        }

                        $notf = null;

                        foreach ($cart->items as $prod) {
                            if ($prod['item']['user_id'] != 0) {
                                $vorder =  new VendorOrder;
                                $vorder->order_id = $order->id;
                                $vorder->user_id = $prod['item']['user_id'];
                                $notf[] = $prod['item']['user_id'];
                                $vorder->qty = $prod['qty'];
                                $vorder->price = $prod['price'];
                                $vorder->order_number = $order->order_number;
                                $vorder->save();
                            }
                        }


                        if (!empty($notf)) {
                            $users = array_unique($notf);
                            foreach ($users as $user) {
                                $notification = new UserNotification;
                                $notification->user_id = $user;
                                $notification->order_number = $order->order_number;
                                $notification->save();
                            }
                        }





                        Session::put('temporder', $order);
                        Session::put('tempcart', $cart);



                        Session::forget('cart');
                        Session::forget('already');
                        Session::forget('coupon');
                        Session::forget('coupon_total');
                        Session::forget('coupon_total1');
                        Session::forget('coupon_percentage');





                        return redirect($backcall['url']);
                    }
                }
            }
        }
    }

    public function paysuccess(Request $request)
    {
        $GetToken = $this->GetToken();

        function getInvoice($e, $d)
        {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'restpilot.paylink.sa/api/getInvoice/' . $e,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $d . '',
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $response = json_decode($response, true);
            return $response;
        }

        function setPiad($transactionNo, $orderNumber)
        {







            $product = Order::where('order_number', '=', $orderNumber)->where('transaction_id', '=', $transactionNo)->first();
            $product->payment_status =  "Completed";
            $product->transfer_date =   date('YYYY:DD:MM');
            $product->update();
            if ($product) {
                return "ok, done";
            } else {
                return "Error";
            }
        }






        //return setPiad($request->transactionNo, $request->orderNumber);
        return getInvoice($request->transactionNo, $GetToken);
    }

    public function GetToken()
    {

        $settingV = array(
            "apiId" => "APP_ID_1123453311", // Data model to send to login using Merchant API account
            "persistToken" => false, //This is boolean value. if set to true, then the returned token valid for 30 hours. Otherwise, the returned token will be valid for 30 minutes.
            "secretKey" => "0662abb5-13c7-38ab-cd12-236e58f43766"
            //This secret key and must be saved in a secure place and must not be exposed outside the server side of the merchant system.
            // Secret key is given by Paylink. If you need the SECRET KEY, send request for Merchant API account to email info@paylink.sa
        );
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
            CURLOPT_POSTFIELDS => json_encode($settingV),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response, true);
        return $response['id_token'];
    }
}
