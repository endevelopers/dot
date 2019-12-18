<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RajaOngkir extends Controller
{
    //
    public function provinces(){

        $key = '?id='.request()->get('searchKey');

        return $this->request('province', $key);
    }

    public function city(){
        $key = '?id='.request()->get('searchKey');
        return $this->request('city', $key);
    }

    
    public function request($pivot, $key){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/".$pivot.$key,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: 0df6d5bf733214af6c6644eb8717c92c"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    } 
}
