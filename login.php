<?php 
    include('functions.php');

    if (get_or_post("race", -1) == -1)
    {
        include('./templates/login.html');
    }
    else
    {
        $login = get_or_post("login", "");
        $name = get_or_post("name", "");
        $password = get_or_post("password", "");
        $race = get_or_post("race", -1);

        if ($login == "" or $name == "" or $password == "" or $race == -1)
        {
            include('./templates/error.html');
        }
        
        $score = 0;
        $user = sql_req("SELECT * FROM player where login = \"" . $login . "\"");

        if (strlen($user[0]["id"]) == 0)
        {
            $score += 100;
            sql_req("INSERT INTO player(login, race, password, score) VALUE(\"" 
            . $login . "\"," . $race . "," . hash('sha256', $password) . "," . $score . ")");
        }
        else if ($user[0]["password"] == hash('sha256', $password))
        {
            $score = $user[0]["score"];
            setcookie("user", $user, time() + (86400 * 30), "/");
            include('game.php');
        }
        else
        {
            include('./templates/error.html');
        }
    }
?>