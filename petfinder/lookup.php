<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

//var_dump($_POST);
$id = $_POST['petid'];

if (ctype_digit($id) && $id > 0) {
    //echo $id;
}
else {
    echo "Invalid Pet ID";
    return;
}

//Connect to DB
require $_SERVER['DOCUMENT_ROOT'].'/../pdo-config.php';

try {
    //Instantiate a PDO database object
    $dbh = new PDO (DB_DSN, DB_USERNAME, DB_PASSWORD);
    //echo "Yay!";
}
catch (PDOException $e) {
    echo "Error connecting to DB " . $e->getMessage();
}

//1. Define the query
$sql = "SELECT * FROM pets WHERE id = :id";

//2. Prepare the statement
$statement = $dbh->prepare($sql);

//3. Bind the parameters (if there are any)
$statement->bindParam(':id', $id);

//4. Execute the statement
$statement->execute();

//5. Process the result (if there is one)
if ($statement->rowCount() == 1) {
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    echo $row['id']." ".$row['name']." ".$row['type']." ".$row['color'];
}
else {
    echo "Pet $id not found";
}

$result = array("one", "two", "three");
echo "<ul>";
foreach ($result as $row) {
    echo "<li>$row</li>";
}
echo "</ul>";