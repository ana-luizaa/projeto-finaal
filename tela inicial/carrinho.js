
document.addEventListener('DOMContentLoaded', function() {
    // Seleciona os elementos
    const cartIcon = document.querySelector('.cart-icon');
    const cart = document.getElementById('cart');
    const closeCartButton = document.getElementById('close-cart');

    // Função para mostrar o carrinho
    function showCart() {
        cart.classList.add('cart-visible');
    }

    // Função para esconder o carrinho
    function hideCart() {
        cart.classList.remove('cart-visible');
    }

    // Adiciona o evento de clique ao ícone do carrinho
    cartIcon.addEventListener('click', function(event) {
        event.preventDefault(); // Previne o comportamento padrão do link
        showCart();
    });

    // Adiciona o evento de clique ao botão de fechar
    closeCartButton.addEventListener('click', function() {
        hideCart();
    });

    // Adiciona o evento de clique fora do carrinho para fechá-lo
    document.addEventListener('click', function(event) {
        if (!cart.contains(event.target) && !cartIcon.contains(event.target)) {
            hideCart();
        }
    });
});

