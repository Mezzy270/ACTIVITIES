<?php
// fetch.php
// Demonstrates fetch(): returns ONE row (the next row) of the result set.

require_once 'dbconfig.php';

// Look up a single item by its primary key
$sql  = "SELECT * FROM grocery_items WHERE item_id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => 1]);   // item_id 1 = Lindt Excellence Dark 70%

$item = $stmt->fetch();        // one row only (false if nothing found)

echo "<pre>";
print_r($item);
echo "</pre>";
