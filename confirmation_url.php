<?php
    header("Content-Type: application/json");
    $response = '{
        "ResultCode":0,
        "ResultDesc": "Configuration received successfully"
    }';
    // Data
    $mpesaResponse = file_get_contents('php://input');

    $logFile = "M_PesaResponse.txt";

    $jsonMpesaResponse = json_decode($mpesaResponse, true);

    // write to file
    $log = fopen($logFile, "a");

    fwrite($log, $jsonMpesaResponse);
    fclose($log);

    echo $response
?>