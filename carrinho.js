document.addEventListener('DOMContentLoaded', function() {
  
    const cartIcon = document.querySelector('.cart-icon');
    const cart = document.getElementById('cart');
    const emptyCartMessage = document.getElementById('empty-cart-message');

    function showCart() {
        cart.classList.add('cart-visible');
    }

    function hideCart() {
        cart.classList.remove('cart-visible');
    }

    cartIcon.addEventListener('click', function(event) {
        event.preventDefault(); 
        showCart();
    });

    document.addEventListener('click', function(event) {
    
        if (!cart.contains(event.target) && !cartIcon.contains(event.target)) {
            hideCart();
        }
    });

    function checkCartItems() {
        const hasItems = false; 
        
        if (hasItems) {
            emptyCartMessage.style.display = 'none'; 
        } else {
            emptyCartMessage.style.display = 'block'; 
        }
    }

    checkCartItems(); git
});




