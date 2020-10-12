<?php 
$browserinfo = get_browser(null,true);
$phpinfo =  phpversion();

//for before php7.2
    if(version_compare($phpinfo,"7.2.0","<=")) {
        header('Set-Cookie: cross-site-cookie=name; SameSite=None; Secure');
    }
    else{
        setcookie('cross-site-cookie', 'name', ['samesite' => 'None', 'secure' => true]);

    }
?>