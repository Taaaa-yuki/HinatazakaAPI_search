<?php

if (isset($_POST["submit"])) {
    $search_by = $_POST['search_by'];
    $query = $_POST["query"];
    $url = "http://localhost:3000/members?" . $search_by . "=" . rawurlencode($query);
    $hinatazaka = GetMembers($url);
}

function GetMembers($url) {
    $max_retry = 1;
    $retry_count = 0;
    while (true) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $hinatazaka = json_decode($response, true);
        if (!empty($hinatazaka)) {
            return $hinatazaka;
        }
        $retry_count++;
        if ($retry_count >= $max_retry) {
            return null;
        }
        sleep(1);
    }
}


?>