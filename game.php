<?php
    include('functions.php');

    if (get_or_post("total", 0) == 0)
    {
        include('./templates/game.html');
    }
    else
    {
        $user = $_COOKIE["user"]["score"];
        sql_req("UPDATE player SET score = " . $_COOKIE["user"][0]["score"] + 10 * get_or_post("total", 0)
        . " where id = " . $_COOKIE["user"][0]["id"]);
    }
?>