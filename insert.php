<?php
// insert.php
// Demonstrates inserting a new record with a prepared statement.

require_once 'dbconfig.php';

// Named placeholders (:name) keep user data separate from SQL, which prevents SQL injection
$sql = "INSERT INTO grocery_items
            (item_name, brand, category, unit_size, price_chf, stock_quantity, expiry_date)
        VALUES
            (:item_name, :brand, :category, :unit_size, :price_chf, :stock_quantity, :expiry_date)";

$stmt = $pdo->prepare($sql);

// Values for the new record
$stmt->execute([
    'item_name'      => 'Ovomaltine Crunchy Biscuits',
    'brand'          => 'Ovomaltine',
    'category'       => 'Bakery & Biscuits',
    'unit_size'      => '150 g',
    'price_chf'      => 3.40,
    'stock_quantity' => 60,
    'expiry_date'    => '2027-05-10',
]);

// rowCount() = number of rows affected; lastInsertId() = auto-generated item_id
echo "Inserted " . $stmt->rowCount() . " record. New item_id: " . $pdo->lastInsertId();
