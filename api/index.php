<?php
$original_data  = file_get_contents('php://input');
$decoded_data   = json_decode($original_data, true);
$encoded_data   = json_encode($decoded_data);

if (isset($decoded_data['type']) and isset($decoded_data['cloud_id'])) {

    $type       = $decoded_data['type'];
    $cloud_id   = $decoded_data['cloud_id'];

    $url = "https://script.google.com/macros/s/AKfycbzxF2mSNkAlNdOYZaQQ-WbEd3idqTz3YWo8W6UTiJYDqiEOb37naT7yefhPAfMsOXO1/exec?action=attLog"; // Replace with your target URL

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true); // Set request method to POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded_data); // Set JSON body data from $encoded_data
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Capture the response

    $result = curl_exec($ch);

    curl_close($ch);

    // echo $result;

}
