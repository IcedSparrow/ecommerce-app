<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obsługa płatności i finalizacja zamówienia
    // Można zintegrować z API płatności np. PayPal
    
    // Wypełnij tutaj kod płatności, jeśli potrzebujesz.
    
    // Opróżnienie koszyka po złożeniu zamówienia
    $_SESSION['cart'] = [];
    header('Location: thank_you.php'); // Przekierowanie do thank_you.php
    exit; // Upewnij się, że skrypt kończy się po przekierowaniu
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Checkout</title>
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <h2>Checkout</h2>

    <form action="checkout.php" method="POST" id="checkoutForm">
        <label for="name">Full Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required>

        <label for="credit_card">Credit Card:</label>
        <input type="text" name="credit_card" id="credit_card" required>

        <button type="submit">Place Order</button>
    </form>

    <?php include '../includes/footer.php'; ?>
    <script src="../assets/js/script.js"></script>
</body>
</html>
