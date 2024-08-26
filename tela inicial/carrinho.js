document.addEventListener('DOMContentLoaded', function() {
    // Seleciona os elementos
    const cartIcon = document.querySelector('.cart-icon');
    const cart = document.getElementById('cart');
    const emptyCartMessage = document.getElementById('empty-cart-message');

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

    // Adiciona o evento de clique fora do carrinho para fechá-lo
    document.addEventListener('click', function(event) {
        // Verifica se o clique foi fora do carrinho e do ícone do carrinho
        if (!cart.contains(event.target) && !cartIcon.contains(event.target)) {
            hideCart();
        }
    });

    // Verifica se há itens no carrinho (simulação de verificação)
    function checkCartItems() {
        const hasItems = false; // Ajuste essa lógica de acordo com o estado real do carrinho
        
        if (hasItems) {
            emptyCartMessage.style.display = 'none'; // Esconde a mensagem se houver itens
        } else {
            emptyCartMessage.style.display = 'block'; // Mostra a mensagem se o carrinho estiver vazio
        }
    }

    checkCartItems(); // Verifica o estado do carrinho ao carregar a página
});




