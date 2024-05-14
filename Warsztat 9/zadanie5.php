<?php
    $default = 'zadanie1.php';
    $userIP = $_SERVER['REMOTE_ADDR'];
    echo "Your IP address: $userIP";

    if (file_exists('ips.txt')){
        $allowedIP = file('ips.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (in_array($userIP, $allowedIP)){
            $allowedPage = 'zadanie2.php';
            include($allowedPage);
        } else include($default);
    
    } else include($default);
?>