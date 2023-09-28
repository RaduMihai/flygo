<?php
$url = 'server/url/words/' . date("Y-m-d");
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
//@toDo do something with the output

curl_close($ch);