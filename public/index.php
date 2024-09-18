<?php
session_start(); // Rozpoczęcie sesji

// Połączenie z bazą danych
include '../config/db.php';

// Pobranie wszystkich produktów z bazy danych
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Home - E-commerce Store</title>
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <div class="container">
        <h1>Welcome to Our E-commerce Store</h1>
        <h2>Featured Products</h2>
        <div class="product-list">
            <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="../assets/images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="number" name="quantity" value="1" min="1" max="<?php echo $product['stock']; ?>" required>
                    <button type="submit">Add to Cart</button>
                </form>
                <a href="product_details.php?id=<?php echo $product['id']; ?>" class="details-button">View Details</a> <!-- Sprawdź ten link -->
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>
</body>
</html>
