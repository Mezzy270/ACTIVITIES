<?php
// update.php
// Demonstrates updating an existing record with a prepared statement.

require_once 'dbconfig.php';

// Change the price and stock of one item (item_id 1)
$sql = "UPDATE grocery_items
        SET price_chf = :price_chf,
            stock_quantity = :stock_quantity
        WHERE item_id = :id";      // WHERE limits the update to a single row

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'price_chf'      => 3.50,
    'stock_quantity' => 150,
    'id'             => 1,
]);

if ($stmt->rowCount() > 0) {
    echo "Record updated successfully.";
} else {
    echo "No changes made (record not found or values are the same).";
}
