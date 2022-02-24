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

//INSERT INTO pets (name, type, color)
//VALUES ('Oliver', 'cat', 'black');

//2. Prepare the statement

//3. Bind the parameters (if there are any)

//4. Execute the statement

//5. Process the result (if there is one)


//Using a Prepared Statement:  UPDATE

//1. Define the query

//2. Prepare the statement

//3. Bind the parameters (if there are any)

//4. Execute the statement

//5. Process the result (if there is one)


//Using a Prepared Statement:  DELETE

//1. Define the query

//2. Prepare the statement

//3. Bind the parameters (if there are any)

//4. Execute the statement

//5. Process the result (if there is one)


//Using a Prepared Statement:  SELECT

//1. Define the query

//2. Prepare the statement

//3. Bind the parameters (if there are any)

//4. Execute the statement

//5. Process the result (if there is one)
?>
</body>
</html>
