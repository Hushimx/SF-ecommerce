<?php
include_once __DIR__ . '/config.php';
header('Content-Type: application/json');

function conn($url, $req, $data, $auth)
{ 
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'restpilot.paylink.sa/' . $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $req,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            'Authorization:' . $auth . ' ',
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $response = json_decode($response, true);
    return $response;
}

function GetToken()
{
    global $setting;
    //$arr = array();
    $arr = conn("api/auth", "POST", json_encode($setting), "");
    //$arr = json_decode($arr);
    return $arr['id_token'];
}


function addInvoice($token, $amount, $clientEmail, $clientMobile, $clientName, $note, $orderNumber, $products)
{
    $data = array(
        'amount' => $amount,
        "callBackUrl" => "https://www.example.com",
        "clientEmail" => $clientEmail,
        "clientMobile" => $clientMobile,
        "clientName" => $clientName,
        "note" => $note,
        "orderNumber" => $orderNumber,
        "products" => $products
    );
    //print_r(json_encode($data));
    $arr = conn("api/addInvoice", "POST", json_encode($data), $token);

    return $arr;
}

$products01 = array(
    [
        "description" => "Brown Hand bag leather for ladies",
        "imageSrc" => "http://merchantwebsite.com/img/img1.jpg",
        "price" => 150,
        "qty" => 1,
        "title" => "Hand bag"
    ]
);
$token = GetToken();
echo $token ;
print_r(json_encode(
    addInvoice($token, 5, "myclient@email.com", "0509200900", "Zaid Matooq", "This invoice is for VIP client.", "MERCHANT-ANY-UNIQUE-ORDER-NUMBER-123123123", $products01)
));
