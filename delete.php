<?php
// delete.php
// Demonstrates deleting a record with a prepared statement.

require_once 'dbconfig.php';

$id_to_delete = 103;   // item_id of the record to remove (the one added in insert.php)

// Always use WHERE, otherwise every row in the table would be deleted
$sql  = "DELETE FROM grocery_items WHERE item_id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id_to_delete]);

if ($stmt->rowCount() > 0) {
    echo "Record with item_id $id_to_delete was deleted.";
} else {
    echo "No record found with item_id $id_to_delete.";
}
