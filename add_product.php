<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Add Product</h1>

        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];

            $sql = "INSERT INTO products (name, category, price, quantity) VALUES ('$name', '$category', $price, $quantity)";

            if ($conn->query($sql)) {
                echo "<p class='success'>Product added successfully!</p>";
            } else {
                echo "<p class='error'>Error: " . $conn->error . "</p>";
            }
        }
        ?>

        <form method="POST" action="">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="category">Category:</label>
            <input type="text" id="category" name="category">

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>

            <button type="submit" name="submit">Add Product</button>
        </form>

        <div class="center">
            <a href="index.php" class="back-button">Back to Main Page</a>
        </div>
    </div>
</body>
</html>
