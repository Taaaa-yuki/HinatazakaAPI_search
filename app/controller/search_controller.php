<?php
require_once('app/model/search_model.php');

if (isset($_POST["submit"])) {
    $search_by = htmlspecialchars($_POST['search_by'], ENT_QUOTES, 'UTF-8');
    $query = htmlspecialchars($_POST["query"], ENT_QUOTES, 'UTF-8');
    $url = "http://localhost:3000/members?" . $search_by . "=" . rawurlencode($query);
    $hinatazaka = get_members($url);

    if (empty($hinatazaka)) {
        $error_message = "該当するメンバーがいませんでした。";
    }
}

?>