<?php

namespace App\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BkashPaymentController extends Controller
{
    public function get_token()
    {
        session_start();


        return $request_token=$this->_bkash_Get_Token();
        $idtoken=$request_token['id_token'];

        $_SESSION['token']=$idtoken;
        $array = $this->_get_config_info();

        $array['token']=$idtoken;

        $newJsonString = json_encode($array);
        file_put_contents(config_path('bkash.json'),$newJsonString);
        echo $idtoken;
    }

    protected function _bkash_Get_Token(){

       $array = $this->_get_config_info();

        $post_token=array(
            'app_key'=>$array["app_key"],
            'app_secret'=>$array["app_secret"]
        );

        $url=curl_init($array["tokenURL"]);
        $proxy = $array["proxy"];
        $posttoken=json_encode($post_token);
        $header=array(
            'Content-Type:application/json',
            'password:'.$array["password"],
            'username:'.$array["username"]
        );

        curl_setopt($url,CURLOPT_HTTPHEADER, $header);
        curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url,CURLOPT_POSTFIELDS, $posttoken);
        curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
        //curl_setopt($url, CURLOPT_PROXY, $proxy);
        $resultdata=curl_exec($url);
        curl_close($url);
        return json_decode($resultdata, true);
    }

    private function _get_config_info(){
        $path = config_path('bkash.json');
        return json_decode(file_get_contents($path), true);
    }

    public function create_payment(Request  $request)
    {

    }

    public function execute_payment(Request $request)
    {

    }
}
