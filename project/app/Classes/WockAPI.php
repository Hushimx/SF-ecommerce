<?php

namespace App\Classes;

class WockAPI { // Worldofcdkeys API 

/** API CONFIG */
    protected $apiUrl = "https://apienv-dev.worldofcdkeys.com/";
    protected $headers = ['auth' => ["softfireuser", "softfirepass"] ];
    protected $client = null;

    // Set API Base URI
    public function __construct(){
        $this->client = new \GuzzleHttp\Client(['base_uri' => $this->apiUrl]);
    }
/** END API CONFIG */

/** FUNCTIONS */
    // List of all products
    public function getProducts($ids=""){
        $params = "";
        if($ids)
            $params = "?product_id=".join($ids, ",");

        try{
            $res = $this->client->request('GET', 'products'.$params, $this->headers);
        }
        catch(\Exception $e){
            $res = null;
        }

        if($res)
            return $this->bodyFormat($res->getStatusCode(),$res->getBody());
        return $this->bodyFormat("404",'{"message":"Server error..."}');
    }

    public function buyProduct($id=1, $qty=1, $price=12){
        $body=[];
        $body["products"] = [[
            "product_id"=> $id,
			"quantity"=> $qty,
			"price"=> $price,
			"delayed"=> true
        ]];
        $body["only_type"] = "auto";
        $body["bulk_prices"] = false;
        try{
            $res = $this->client->post('order', [
                'auth' => $this->headers["auth"],
                'content-type' => 'application/json', 
                'body' => json_encode($body)
            ]);
        }
        catch(\Exception $e){
            dd($e);
            $res = null;
        }

        if($res)
            return $this->bodyFormat($res->getStatusCode(),$res->getBody());
        return $this->bodyFormat("404",'{"message":"Server error..."}');
    }

    public function getRequest($request_id=""){
        $params = "?client_token=".$request_id;

        try{
            $res = $this->client->request('GET', 'downloadPlain'.$params, $this->headers);
        }
        catch(\Exception $e){
            $res = null;
        }

        if($res)
            return $this->bodyFormat($res->getStatusCode(),$res->getBody());
        return $this->bodyFormat("404",'{"message":"Server error..."}');
    }
/** END FUNCTIONS */


/** HELPERS */
    // Format Body output
    private function bodyFormat($code, $body){
        return ["code" => $code, "body" => json_decode((string) $body, true)];
    }
/** END HELPERS */
}