<?php
session_start(); // Rozpoczęcie sesji

// Sprawdzenie, czy koszyk istnieje w sesji
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    $cartEmpty = true;
} else {
    $cartEmpty = false;
}

// Pobranie danych produktów z bazy danych
include '../config/db.php';

$productIds = array_keys($_SESSION['cart']);
if ($productIds) {
    $placeholders = implode(',', array_fill(0, count($productIds), '?'));
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
    $stmt->execute($productIds);
    $products = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Shopping Cart</title>
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <div class="container">
        <h1>Your Shopping Cart</h1>

        <?php if ($cartEmpty): ?>
            <p>Your cart is empty. <a href="index.php">Continue shopping</a>.</p>
        <?php else: ?>
            <form action="update_cart.php" method="post">
                <table class="cart">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                            <td>$<?php echo number_format($product['price'], 2); ?></td>
                            <td>
                                <input type="number" name="quantities[<?php echo $product['id']; ?>]" value="<?php echo $_SESSION['cart'][$product['id']]; ?>" min="1" max="<?php echo $product['stock']; ?>">
                            </td>
                            <td>$<?php echo number_format($product['price'] * $_SESSION['cart'][$product['id']], 2); ?></td>
                            <td>
                                <a href="remove_from_cart.php?product_id=<?php echo $product['id']; ?>" class="remove-button">Remove</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" name="update_cart">Update Cart</button>
            </form>
        <?php endif; ?>
    </div>

    <?php include '../includes/footer.php'; ?>
</body>
</html>
