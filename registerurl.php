<?php
    $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
  
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    $credentials = base64_encode('DPh667WXtdmPHs4OhodoOgYCGPPjdh2m:mzxzOYIA5zGKJmvN');
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $curl_response1 = curl_exec($curl);
    
    // echo ;
    // echo(json_decode($curl_response)->access_token);
    $tel = json_decode($curl_response1)->access_token;
    // echo($tel);
 
  
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$tel)); //setting custom header
  
  
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