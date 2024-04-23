<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && (isset($_GET["first1"]) && isset($_GET["second"]) && isset($_GET["operations1"]))) {
        $first = $_GET["first1"];
        $second = $_GET["second"];
        $operation = $_GET["operations1"];
        $result;

        switch($operation){
            case "add":
                $result = $first + $second;
                break;
            case "substract:":
                $result = $first - $second;
                break;
            case "multiply":
                $result = $first * $second;
                break;
            case "divide":
                if ($second != 0){
                    $result = $first / $second;
                    break;
                } else {
                    $result = "Nie mozna dzielic przez zero!";
                    break;
                }
            default:
                $result = "Nieprawidlowa operacja!";
        }
        echo "Wynik: " . $result;
    }
?>