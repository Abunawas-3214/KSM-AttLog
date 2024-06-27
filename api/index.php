<?php
$original_data  = file_get_contents('php://input');
$decoded_data   = json_decode($original_data, true);
$encoded_data   = json_encode($decoded_data);

if (isset($decoded_data['type']) and isset($decoded_data['cloud_id'])) {

    $type       = $decoded_data['type'];
    $cloud_id   = $decoded_data['cloud_id'];

    $url = "https://script.google.com/macros/s/AKfycbz5hse5tkadDtOQMfiw77wY1d8C_vFF29TWJq3jcdqxVxl2NSFUJKAfoJCwQigFInsm/exec?action=attLog"; // Replace with your target URL

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true); // Set request method to POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded_data); // Set JSON body data from $encoded_data
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Capture the response

    $result = curl_exec($ch);

    curl_close($ch);

    echo $encoded_data;
}
