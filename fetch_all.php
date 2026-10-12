<?php
// fetch_all.php
// Demonstrates fetchAll(): returns ALL rows of the result set as an array.

require_once 'dbconfig.php';   // bring in the $pdo connection

// Query: all Chocolate & Confectionery items, cheapest first
$sql  = "SELECT * FROM grocery_items WHERE category = :category ORDER BY price_chf ASC";
$stmt = $pdo->prepare($sql);                           // prepare the statement
$stmt->execute(['category' => 'Chocolate & Confectionery']);  // bind value and run

$items = $stmt->fetchAll();    // get every matching row (array of arrays)

// <pre> keeps the line breaks and indentation of print_r() readable in the browser
echo "<pre>";
print_r($items);
echo "</pre>";
