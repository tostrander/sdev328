<?php
/*
    328/pdo/index.php
*/
//Turn on error reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
/*
 * Create = INSERT
 * Read = SELECT
 * Update = UPDATE
 * Delete = DELETE
 */
//require '/home2/tostrand/pdo-config.php';
//echo $_SERVER['DOCUMENT_ROOT'];
require $_SERVER['DOCUMENT_ROOT'].'/../pdo-config.php';

try {
    //Instantiate a PDO database object
    $dbh = new PDO (DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo "Yay!";
}
catch (PDOException $e) {
    echo "Error connecting to DB " . $e->getMessage();
}

//Using a Prepared Statement:  INSERT

//1. Define the query

$sql = "INSERT INTO pets (type, name, color)
        VALUES (:type, :name, :color)";

//2. Prepare the statement
$statement = $dbh->prepare($sql);

//3. Bind the parameters (if there are any)
$type = 'kangaroo';
$name = 'Joey';
$color = 'purple';
$statement->bindParam(':type', $type);
$statement->bindParam(':name', $name);
$statement->bindParam(':color', $color);

//4. Execute the statement
$statement->execute();
$id = $dbh->lastInsertId();
echo "<p>$name inserted with ID: $id</p>";

//3b. Bind the parameters (if there are any)
$type = 'parrot';
$name = 'Polly';
$color = 'green';
$statement->bindParam(':type', $type);
$statement->bindParam(':name', $name);
$statement->bindParam(':color', $color);

//4b. Execute the statement
$statement->execute();
$id = $dbh->lastInsertId();
echo "<p>$name inserted with ID: $id</p>";

//5. Process the result (if there is one)


//Using a Prepared Statement:  UPDATE

//1. Define the query
$sql = "UPDATE pets SET name = :name WHERE type = :type";

//2. Prepare the statement
$statement = $dbh->prepare($sql);

//3. Bind the parameters (if there are any)
$name = 'Fred';
$type = 'kangaroo';
$statement->bindParam(':name', $name);
$statement->bindParam(':type', $type);

//4. Execute the statement
$statement->execute();

//5. Process the result (if there is one)


//Using a Prepared Statement:  DELETE

//1. Define the query
$sql = "DELETE FROM pets WHERE id = :id";

//2. Prepare the statement
$statement = $dbh->prepare($sql);

//3. Bind the parameters (if there are any)
$id = 5;
$statement->bindParam(':id', $id);

//4. Execute the statement
$statement->execute();
echo "<p>Pet $id has been deleted</p>";

//5. Process the result (if there is one)


//Using a Prepared Statement:  SELECT a single row

//1. Define the query
$sql = "SELECT * FROM pets WHERE id = :id";

//2. Prepare the statement
$statement = $dbh->prepare($sql);

//3. Bind the parameters (if there are any)
$id = 11;
$statement->bindParam(':id', $id);

//4. Execute the statement
$statement->execute();

//5. Process the result (if there is one)
$row = $statement->fetch(PDO::FETCH_ASSOC);
echo $row['id']." ".$row['name']." ".$row['type']." ".$row['color'];

//Using a Prepared Statement:  SELECT a group of rows

//1. Define the query
$sql = "SELECT * FROM pets WHERE type = :type";

//2. Prepare the statement
$statement = $dbh->prepare($sql);

//3. Bind the parameters (if there are any)
$type = 'parrot';
$statement->bindParam(':type', $type);

//4. Execute the statement
$statement->execute();

//5. Process the result (if there is one)
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row) {
    echo "<p>".$row['id']." ".$row['name']." ".$row['type']." ".
        $row['color']."</p>";
}
?>

</body>
</html>
