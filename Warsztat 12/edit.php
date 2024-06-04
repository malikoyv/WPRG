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
            $stmt = $conn->prepare("SELECT * FROM Person WHERE Person_id = ?");
            $stmt->execute([$id]);
            $person = $stmt->fetch(PDO::FETCH_ASSOC);
        } elseif ($type == 'car') {
            $stmt = $conn->prepare("SELECT * FROM Cars WHERE Cars_id = ?");
            $stmt->execute([$id]);
            $car = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['updatePerson'])) {
            $firstname = $_POST['FirstName'];
            $secondname = $_POST['SecondName'];
            $email = $_POST['Email'];
            $id = $_POST['id'];

            $sqlUpdatePerson = "UPDATE Person SET Person_firstname = ?, Person_secondname = ?, Person_email = ? WHERE Person_id = ?";
            $stmt = $conn->prepare($sqlUpdatePerson);
            $stmt->execute([$firstname, $secondname, $email, $id]);
            echo "Person updated successfully";
        } elseif (isset($_POST['updateCar'])) {
            $model = $_POST['Model'];
            $year = $_POST['Year'];
            $person_id = $_POST['Person_id'];
            $id = $_POST['id'];

            $sqlUpdateCar = "UPDATE Cars SET Cars_model = ?, Cars_year = ?, Person_id = ? WHERE Cars_id = ?";
            $stmt = $conn->prepare($sqlUpdateCar);
            $stmt->execute([$model, $year, $person_id, $id]);
            echo "Car updated successfully";
        }
        header("Location: zadanie2.php");
        exit;
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
</head>
<body>
    <h1>Edit Record</h1>
    <?php if (isset($person)) { ?>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $person['Person_id']; ?>">
        <input name="FirstName" type="text" value="<?php echo $person['Person_firstname']; ?>" required><br>
        <input name="SecondName" type="text" value="<?php echo $person['Person_secondname']; ?>" required><br>
        <input name="Email" type="email" value="<?php echo $person['Person_email']; ?>" required><br>
        <button name="updatePerson" type="submit">Update Person</button>
    </form>
    <?php } elseif (isset($car)) { ?>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $car['Cars_id']; ?>">
        <input name="Model" type="text" value="<?php echo $car['Cars_model']; ?>" required><br>
        <input name="Year" type="number" value="<?php echo $car['Cars_year']; ?>" required><br>
        <select name="Person_id" required>
            <?php
                $persons = $conn->query("SELECT * FROM Person");
                while($person = $persons->fetch(PDO::FETCH_ASSOC)){
                    $selected = $car['Person_id'] == $person['Person_id'] ? "selected" : "";
                    echo "<option value='{$person['Person_id']}' $selected>{$person['Person_firstname']} {$person['Person_secondname']}</option>";
                }
            ?>
        </select><br>
        <button name="updateCar" type="submit">Update Car</button>
    </form>
    <?php } ?>
</body>
</html>
