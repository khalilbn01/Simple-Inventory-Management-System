<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product List</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Product Inventory</h1>
    <a href="add_product.php">Add Product</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM products");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['category']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['quantity']}</td>
                    <td>
                        <a href='edit_product.php?id={$row['id']}'>Edit</a> |
                        <a href='delete_product.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
