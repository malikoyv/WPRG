<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 2</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "zadanie1";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sqlPerson = "CREATE TABLE IF NOT EXISTS Person (
                Person_id INT AUTO_INCREMENT PRIMARY KEY,
                Person_firstname VARCHAR(255),
                Person_secondname VARCHAR(255),
                Person_email VARCHAR(255)
            )";
            $conn->exec($sqlPerson);

            $sqlCars = "CREATE TABLE IF NOT EXISTS Cars (
                Cars_id INT AUTO_INCREMENT PRIMARY KEY,
                Cars_model VARCHAR(255),
                Cars_year INT,
                Person_id INT,
                FOREIGN KEY (Person_id) REFERENCES Person(Person_id)
            )";
            $conn->exec($sqlCars);

            echo "Tables created successfully<br>";

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['addPerson'])) {
                $firstname = $_POST['FirstName'];
                $secondname = $_POST['SecondName'];
                $email = $_POST['Email'];

                $sqlAddPerson = "INSERT INTO Person (Person_firstname, Person_secondname, Person_email) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sqlAddPerson);
                $stmt->execute([$firstname, $secondname, $email]);
                echo "New person added successfully<br>";
            } elseif (isset($_POST['addCar'])) {
                $model = $_POST['Model'];
                $year = $_POST['Year'];
                $person_id = $_POST['Person_id'];

                $sqlAddCar = "INSERT INTO Cars (Cars_model, Cars_year, Person_id) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sqlAddCar);
                $stmt->execute([$model, $year, $person_id]);
                echo "New car added successfully<br>";
            }
        }
    ?>

    <h1>Manage MySQL Database</h1>

    <h3>Add Person</h3>
    <form method="post" name="person">
        <input name="FirstName" type="text" placeholder="FirstName" required><br>
        <input name="SecondName" type="text" placeholder="SecondName" required><br>
        <input name="Email" type="email" placeholder="Email" required><br>
        <button name="addPerson" type="submit">Add Person</button>
    </form>

    <h3>Add Car</h3>
    <form method="post" name="car">
        <input name="Model" type="text" placeholder="Model" required><br>
        <input name="Year" type="number" placeholder="Year" required><br>
        <select name="Person_id" required>
            <?php
                $persons = $conn->query("SELECT * FROM Person");
                while($person = $persons->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$person['Person_id']}'>{$person['Person_firstname']} {$person['Person_secondname']}</option>";
                }
            ?>
        </select><br>
        <button name="addCar" type="submit">Add Car</button>
    </form>

    <h3>Persons</h3>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $persons = $conn->query("SELECT * FROM Person");
                while($person = $persons->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>
                        <td>{$person['Person_firstname']}</td>
                        <td>{$person['Person_secondname']}</td>
                        <td>{$person['Person_email']}</td>
                        <td>
                            <a href='edit.php?id={$person['Person_id']}&type=person'>Edit</a>
                            <a href='delete.php?id={$person['Person_id']}&type=person'>Delete</a>
                        </td>
                    </tr>";
                }
            ?>
        </tbody>
    </table>

    <h3>Cars</h3>
    <table>
        <thead>
            <tr>
                <th>Model</th>
                <th>Year</th>
                <th>Owner</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $cars = $conn->query("SELECT Cars.*, Person.Person_firstname, Person.Person_secondname FROM Cars JOIN Person ON Cars.Person_id = Person.Person_id");
                while($car = $cars->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>
                        <td>{$car['Cars_model']}</td>
                        <td>{$car['Cars_year']}</td>
                        <td>{$car['Person_firstname']} {$car['Person_secondname']}</td>
                        <td>
                            <a href='edit.php?id={$car['Cars_id']}&type=car'>Edit</a>
                            <a href='delete.php?id={$car['Cars_id']}&type=car'>Delete</a>
                        </td>
                    </tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>