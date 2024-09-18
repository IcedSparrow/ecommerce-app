<?php
session_start(); // Rozpoczęcie sesji

// Sprawdzenie, czy przesłano dane
if (isset($_POST['update_cart'])) {
    // Iteracja przez wszystkie produkty w koszyku
    foreach ($_POST['quantities'] as $productId => $quantity) {
        // Sprawdzenie, czy ilość jest większa lub równa 0
        if ($quantity >= 0) {
            // Aktualizacja ilości w koszyku
            $_SESSION['cart'][$productId] = $quantity;
        } else {
            // Jeśli ilość jest mniejsza niż 0, usuwamy produkt z koszyka
            unset($_SESSION['cart'][$productId]);
        }
    }

    // Przekierowanie do strony koszyka
    header('Location: cart.php');
    exit();
} else {
    // Jeśli dane nie zostały przesłane, przekierowanie na stronę główną
    header('Location: index.php');
    exit();
}
?>
