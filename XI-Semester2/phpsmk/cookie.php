<?php 

    $_COOKIE_name = 'user';
    $_COOKIE_name = 'joni';

    setcookie($_COOKIE_name, $_COOKIE_value);

    $_COOKIE_value = 'tejo';

    setcookie($_COOKIE_name, $_COOKIE_value);

    echo $_COOKIE[$_COOKIE_name];

    setcookie("user", "", time() - 3600);

    echo '<br>';

    var_dump($_COOKIE);
    
?>