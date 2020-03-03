<?php
    $consumerKey = 'DPh667WXtdmPHs4OhodoOgYCGPPjdh2m';
    $consumerSecret = 'mzxzOYIA5zGKJmvN';
    $headers = ['Content-Type:application/json','charset-utf8'];

    $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); //setting a custom header
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USRPWD, $consumerKey.':'.$consumerSecret);

    $result = curl_exec($curl);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $result = json_decode($result);


    $access_token=$result->access_token;

    echo($access_token);

    curl_close($curl);

 
  
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token1)); //setting custom header
  
  
  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'ShortCode' => '60502',
    'ResponseType' => 'Confirmed',
    'ConfirmationURL' => 'https://mpesatestmike.herokuapp.com/confirmation_url.php',
    'ValidationURL' => 'https://mpesatestmike.herokuapp.com/validation.php'
  );
  
  $data_string = json_encode($curl_post_data);
  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  
  $curl_response = curl_exec($curl);
  print_r($curl_response);
  
  echo $curl_response;
  ?>