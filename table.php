<?php
// table.php
// Renders an SQL result set as an HTML table.

require_once 'dbconfig.php';

// Total stock value per brand, only brands with 3+ items (GROUP BY + HAVING)
$sql = "SELECT brand,
               COUNT(*)                      AS item_count,
               ROUND(AVG(price_chf), 2)      AS avg_price_chf,
               SUM(price_chf * stock_quantity) AS inventory_value_chf
        FROM grocery_items
        GROUP BY brand
        HAVING COUNT(*) >= 3
        ORDER BY inventory_value_chf DESC";

$rows = $pdo->query($sql)->fetchAll();   // no user input, so query() is fine here
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Swiss Grocery Brands</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #999; padding: 6px 12px; }
        th { background: #d52b1e; color: #fff; }   /* Swiss red */
    </style>
</head>
<body>
    <h2>Brand Summary (CHF)</h2>
    <table>
        <thead>
            <tr>
                <th>Brand</th>
                <th>Items</th>
                <th>Avg Price</th>
                <th>Inventory Value</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row): ?>
            <tr>
                <!-- htmlspecialchars() escapes special characters to prevent XSS -->
                <td><?= htmlspecialchars($row['brand']) ?></td>
                <td><?= $row['item_count'] ?></td>
                <td><?= number_format($row['avg_price_chf'], 2) ?></td>
                <td><?= number_format($row['inventory_value_chf'], 2) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
