<?php
    // Your database connection code here...
    include 'db.php';

    // Fetching product data for editing
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = $conn->query($sql);
        $product = $result->fetch_assoc();
    }

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $sql = "UPDATE products SET name='$name', category='$category', price=$price, quantity=$quantity WHERE id=$id";
        if ($conn->query($sql)) {
            echo "<p class='success'>Product updated successfully!</p>";
        } else {
            echo "<p class='error'>Error: " . $conn->error . "</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>

        <form method="POST" action="">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required>

            <label for="category">Category:</label>
            <input type="text" id="category" name="category" value="<?php echo $product['category']; ?>">

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>" step="0.01" required>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="<?php echo $product['quantity']; ?>" required>

            <button type="submit" name="update">Update Product</button>
        </form>

        <div class="center">
            <a href="index.php" class="back-button">Back to Main Page</a>
        </div>
    </div>
</body>
</html>
