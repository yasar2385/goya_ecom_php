document.addEventListener('DOMContentLoaded', () => {
    const cart = document.getElementById('cart');
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    let total = 0;

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', (e) => {
            const product = button.getAttribute('data-product');
            const price = parseFloat(button.getAttribute('data-price'));
            const image = button.getAttribute('data-image');
            addItemToCart(product, price, image);
            openCart();
            e.preventDefault();
        });
    });

    // document.getElementById('close-cart').addEventListener('click', closeCart);
    // let openTimer = setInterval(() => {
    //     if (document.getElementById('carticon')) {
    //         document.getElementById('carticon').onclick = openCart;
    //         clearInterval(openTimer);
    //     }
    // }, 500);

    function openCart() {
        cart.classList.add('open');
    }

    function closeCart() {
        cart.classList.remove('open');
    }

    function addItemToCart(product, price, image) {
        let cartItem = document.querySelector(`[data-product-name="${product}"]`);

        if (cartItem) {
            const quantityInput = cartItem.querySelector('.quantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updateCartItemTotal(cartItem, price);
        } else {
            cartItem = document.createElement('li');
            cartItem.setAttribute('data-product-name', product);
            cartItem.innerHTML = `
               <img src="${image}" alt="${product}" >
                <div class="cart-product-details">
              <span class="cart-product-name">${product}</span><br><span class="cart-cost-price">Rs.${price.toFixed(2)}</span>
                <div class="quantity-controls">
                    <button class="decrease">-</button>
                    <input type="text" class="quantity" value="1" readonly>
                    <button class="increase">+</button>
                </div>
                 <button class="remove-button">Remove</button>
                </div>
                 <span class="item-total-Rs">Rs.<span class="item-total">${price.toFixed(2)}</span></span>`;
            cartItems.appendChild(cartItem);
            cartItem.querySelector('.increase').addEventListener('click', () => {
                const quantityInput = cartItem.querySelector('.quantity');
                quantityInput.value = parseInt(quantityInput.value) + 1;
                updateCartItemTotal(cartItem, price);
            });

            cartItem.querySelector('.decrease').addEventListener('click', () => {
                const quantityInput = cartItem.querySelector('.quantity');
                if (parseInt(quantityInput.value) > 1) {
                    quantityInput.value = parseInt(quantityInput.value) - 1;
                    updateCartItemTotal(cartItem, price);
                }
            });

            cartItem.querySelector('.remove-button').addEventListener('click', () => {
                cartItem.remove();
                updateCartTotal();
            });
        }
        updateCartTotal();
    }

    function updateCartItemTotal(cartItem, price) {
        const quantity = parseInt(cartItem.querySelector('.quantity').value);
        const itemTotal = cartItem.querySelector('.item-total');
        itemTotal.textContent = (quantity * price).toFixed(2);
        updateCartTotal();
    }

    function updateCartTotal() {
        total = 0;
        document.querySelectorAll('.item-total').forEach(itemTotal => {
            total += parseFloat(itemTotal.textContent);
        });
        cartTotal.textContent = total.toFixed(2);
    }
});