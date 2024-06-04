<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 1</title>
</head>
<body>
    <h1>Manage MySQL Table</h1>
    <form method="post">
        <button type="submit" name="submit" class="delete">Delete Table</button>
    </form>
    
    <?php
    // przed sprawdzeniem skonfigurowac
    // 1. CREATE DATABASE zadanie1;
    // 2. USE zadanie1;
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "zadanie1";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "CREATE TABLE IF NOT EXISTS Student (
            StudentID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
            FirstName VARCHAR(255),
            SecondName VARCHAR(255),
            Salary INT,
            DateOfBirth DATE
        )";

        if ($conn->query($sql) === TRUE) {
            echo "Table Student created successfully<br>";
        } else {
            echo "Table already exists<br>";
        }   
        
        if(isset($_POST['submit'])){
            $sql2 = "DROP TABLE IF EXISTS Student;";
            if ($conn->query($sql2) === TRUE){
                echo "Table Student deleted<br>";
            } else {
                echo "Error deleting table: " . $conn->error;
            }
        }
        $conn->close();
    ?>
</body>
</html>