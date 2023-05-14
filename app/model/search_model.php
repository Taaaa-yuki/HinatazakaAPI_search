<?php

function get_members($url) {
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
        if ($hinatazaka !== null && !empty($hinatazaka)) {
            foreach ($hinatazaka as &$member) {
                $profile_url = get_profile_url($member['id']);
                $member['profile_url'] = $profile_url;
            }
            return $hinatazaka;
        }
        $retry_count++;
        if ($retry_count >= $max_retry) {
            return null;
        }
        sleep(1);
    }
}

function get_profile_url($id) {
    $profile_url = 'https://www.hinatazaka46.com/s/official/artist/' . $id . '?ima=0000';
    return $profile_url;
}


?>