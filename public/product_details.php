<?php
// Łączenie z bazą danych
include '../config/db.php';

// Sprawdzenie, czy identyfikator produktu został przekazany
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Przygotowanie zapytania do bazy danych
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(':id', $product_id);
    $stmt->execute();
    $product = $stmt->fetch();

    // Sprawdzenie, czy produkt został znaleziony
    if (!$product) {
        die("Product not found.");
    }
} else {
    die("No product ID provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title><?php echo htmlspecialchars($product['name']); ?> - Online Store</title>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    
    <div class="product-details">
        <div class="container">
            <h1><?php echo htmlspecialchars($product['name']); ?></h1>
            <img src="../assets/images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
            <h2>Price: $<?php echo number_format($product['price'], 2); ?></h2>
            <p>Available Stock: <?php echo htmlspecialchars($product['stock']); ?></p>
            <form action="add_to_cart.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1" max="<?php echo htmlspecialchars($product['stock']); ?>">
                <button type="submit">Add to Cart</button>
            </form>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>
</body>
</html>
