<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 3</title>
</head>
<body>
    <h1>Registration form</h1>
    <form method="post" name="register">
        <label>First Name:</label><br>
        <input name="fname" type="text" required><br>
        <label>Last Name:</label><br>
        <input name="lname" type="text" required><br>
        <label>Email:</label><br>
        <input name="email" type="email" required><br>
        <label>Password:</label><br>
        <input name="password" type="password" required><br>
        <button name="register" type="submit">Register</button>
    </form>

    <?php
    // CREATE DATABASE zadanie1;
    // USE zadanie1;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zadanie1";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS User (
        ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        FirstName VARCHAR(255),
        SecondName VARCHAR(255),
        Email VARCHAR(255),
        Password VARCHAR(255)
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table Student created successfully<br>";
    } else {
        echo "Table already exists<br>";
    }   

    if (isset($_POST['register'])){
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $fname = $_POST['fname'];
        $sname = $_POST['lname'];
        $email = $_POST['email'];
        $stmt = $conn->prepare('INSERT INTO User (FirstName, SecondName, Email, Password) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $fname, $lname, $email, $password);
        if ($stmt->execute()) {
            echo "Record added successfully<br>";
        } else {
            echo "Error " . $conn->error;
        }
        $stmt->close();
    }

    $count = 'SELECT COUNT(ID) AS user_count FROM User';
    $row = $conn->query($count)->fetch_assoc();
    echo "Number of created users: " . $row['user_count'];

    ?>
</body>
</html>