<?php
// dbconfig.php
// Database connection file using PDO. Other files include this one with require_once.

$host    = 'localhost';          // MySQL server (XAMPP default)
$db      = 'swiss_grocery_db';   // database created by swiss_grocery.sql
$user    = 'root';               // XAMPP default username
$pass    = '';                   // XAMPP default password is empty
$charset = 'utf8mb4';            // supports ä, ö, ü, é, etc.

// Data Source Name (DSN): tells PDO which driver, host, database and charset to use
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// PDO options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // throw exceptions on SQL errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        // rows come back as associative arrays
    PDO::ATTR_EMULATE_PREPARES   => false,                   // use real prepared statements
];

try {
    // Create the PDO connection object, available as $pdo in files that include this one
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // Stop the script and show the error if the connection fails
    die("Database connection failed: " . $e->getMessage());
}
