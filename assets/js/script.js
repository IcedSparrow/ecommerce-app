// assets/js/script.js

// Funkcja walidacji formularza checkout
document.addEventListener('DOMContentLoaded', function() {
    const checkoutForm = document.querySelector('form[action="checkout.php"]');
    
    checkoutForm.addEventListener('submit', function(event) {
        const name = document.querySelector('input[name="name"]').value;
        const address = document.querySelector('input[name="address"]').value;
        const creditCard = document.querySelector('input[name="credit_card"]').value;

        if (name === '' || address === '' || creditCard === '') {
            alert('Please fill in all fields.');
            event.preventDefault(); // Zatrzymaj wysyłanie formularza
        } else {
            // Możesz dodać dodatkowe walidacje, np. na format karty kredytowej
            console.log('Form submitted successfully!');
        }
    });
});

// Funkcja do dynamicznej aktualizacji koszyka
function updateCart() {
    const cartItems = document.querySelectorAll('.cart-item');
    let total = 0;

    cartItems.forEach(item => {
        const price = parseFloat(item.querySelector('.item-price').textContent.replace('$', ''));
        const quantity = parseInt(item.querySelector('.item-quantity').value);
        total += price * quantity;
    });

    document.querySelector('#total').textContent = `$${total.toFixed(2)}`;
}

// Dodaj nasłuchiwacze zdarzeń do zmiany ilości w koszyku
document.querySelectorAll('.item-quantity').forEach(input => {
    input.addEventListener('change', updateCart);
});
