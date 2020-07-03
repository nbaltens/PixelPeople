<?php
$host = 'localhost';
$user = 'root';
$password = '***';
$dbname = 'login-project';

// setDSN - database source name
$dsn = 'mysql:host=' . $host . '; dbname=' . $dbname;

try {
    // create a PDO Instance
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connection succesfull";

} catch(PDOException $e) {
    echo "connection failed: " . $e->getMessage();

}

?>
