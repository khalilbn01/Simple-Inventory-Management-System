<?php include 'db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM products WHERE id = $id";
    if ($conn->query($sql)) {
        echo "Product deleted successfully!";
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid request.";
    header("Location: index.php");
    exit;
}
?>
