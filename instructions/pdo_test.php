<?php

try {
    $conn = new PDO("mysql:host=localhost;dbname=john", 'john', 'john');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch (PDOException $e) {
	echo "<pre>";
    var_dump($e);
	echo "</pre>";
}
