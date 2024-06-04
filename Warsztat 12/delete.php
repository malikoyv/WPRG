<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zadanie1";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id']) && isset($_GET['type'])) {
        $id = $_GET['id'];
        $type = $_GET['type'];

        if ($type == 'person') {
            $sqlDeletePerson = "DELETE FROM Person WHERE Person_id = ?";
            $stmt = $conn->prepare($sqlDeletePerson);
            $stmt->execute([$id]);
            echo "Person deleted successfully";
        } elseif ($type == 'car') {
            $sqlDeleteCar = "DELETE FROM Cars WHERE Cars_id = ?";
            $stmt = $conn->prepare($sqlDeleteCar);
            $stmt->execute([$id]);
            echo "Car deleted successfully";
        }
        header("Location: zadanie2.php");
        exit;
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
