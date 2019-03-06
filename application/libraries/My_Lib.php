<?php
class My_Lib {
    public function GetApi($url, $method) {
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => array(
            "key: your-api-key"
        ),
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
    
        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }
    public function PostApi($url, $params) {
        $headers = array('Content-Type: application/x-www-form-urlencoded');

        // Open connection
        $ch = curl_init();

        $params = array(
            'username' => 'keniamalia',
            'password' => '1234',
            'action' => 'login'
        );

        // Set the url, number of GET vars, GET data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Execute request
        $result = curl_exec($ch);

        // Close connection
        curl_close($ch);

        // get the result and parse to JSON
        $items = json_decode($result);

        if(isset($items)){ echo $items ; }

        else { echo "gagal" ; }

    }
}

?>