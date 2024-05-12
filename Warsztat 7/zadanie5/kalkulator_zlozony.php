<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && (isset($_GET["first2"]) && isset($_GET["operations2"]))){
        $number = $_GET["first2"];
        $operation = $_GET["operations2"];
        $result;

        switch($operation){
            case "cos":
                $result = cos($number);
                break;
            case "sin":
                $result = sin($number);
                break;
            case "tg":
                $result = tan($number);
                break;
            case "2do10":
                $result = bindec($number);
                break;
            case "10do2":
                $result = decbin($number);
                break;
            case "hex":
                $result = hexdec($number);
                break;
            default:
                $result = "Nieprawidlowa operacja!";
                break;
        }
        echo "Wynik: " . $result;
    }
?>