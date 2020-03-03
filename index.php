<?php
  $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
  
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
  
  ?>