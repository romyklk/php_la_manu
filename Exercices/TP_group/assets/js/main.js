// Validation du formulaire de paiement
document.addEventListener('DOMContentLoaded', function () {
    const paymentForm = document.getElementById('payment-form');
    if (paymentForm) {
        paymentForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Simulation de paiement
            setTimeout(() => {
                document.getElementById('payment-success').style.display = 'flex';
            }, 1500);
        });
    }

    // Formatage du numéro de carte
    const cardInput = document.getElementById('card-number');
    if (cardInput) {
        cardInput.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\s/g, '');
            value = value.replace(/(\d{4})/g, '$1 ').trim();
            e.target.value = value;
        });
    }

    // Formatage de la date d'expiration
    const expiryInput = document.getElementById('expiry');
    if (expiryInput) {
        expiryInput.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.slice(0, 2) + '/' + value.slice(2);
            }
            e.target.value = value;
        });
    }
});

// Validation des images
function handleImageError(img) {
    img.src = 'assets/images/default-book.png';
}

// Animation des messages de succès
document.querySelectorAll('.success-message').forEach(message => {
    message.style.animation = 'slideIn 0.5s ease-out';
});