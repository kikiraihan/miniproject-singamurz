<header class="bg-white shadow-md fixed top-0 left-0 right-0 z-10">
  <div class="container mx-auto px-4 py-4 flex items-center justify-between">
      <div class="text-2xl font-bold text-singa flex items-center">
          <i class='bx bxs-store mr-2'></i>
          MyShop
      </div>
      <div class="w-full max-w-xl mx-4">
          <div class="relative">
              <input type="text" placeholder="Search products..." class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-singa">
              <button class="absolute right-3 top-2 text-gray-400 hover:text-singa">
                  <i class='bx bx-search'></i>
              </button>
          </div>
      </div>
      <div class="flex items-center">
          <button id="cartButton" class="text-gray-600 hover:text-singa text-2xl relative">
              <i class='bx bx-cart'></i>
              <span id="cartCount" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">0</span>
          </button>
      </div>
  </div>
</header>

<!-- Cart Modal -->
<div id="cartModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
      <div class="mt-3 text-center">
          <h3 class="text-lg leading-6 font-medium text-gray-900">Shopping Cart</h3>
          <div class="mt-2 px-7 py-3">
              <ul id="cartItems" class="text-left"></ul>
              <p id="cartTotal" class="mt-4 font-bold"></p>
          </div>
          <div class="items-center px-4 py-3">
              <button id="closeCart" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                  Close
              </button>
          </div>
      </div>
  </div>
</div>

<script>
  let cart = [];
  let cartCount = 0;

  function addToCart(productName, price) {
      cart.push({name: productName, price: price});
      cartCount++;
      updateCartCount();
  }

  function updateCartCount() {
      document.getElementById('cartCount').innerText = cartCount;
  }

  function displayCart() {
      const cartItems = document.getElementById('cartItems');
      const cartTotal = document.getElementById('cartTotal');
      cartItems.innerHTML = '';
      let total = 0;

      cart.forEach(item => {
          const li = document.createElement('li');
          li.textContent = `${item.name} - $${item.price.toFixed(2)}`;
          cartItems.appendChild(li);
          total += item.price;
      });

      cartTotal.textContent = `Total: $${total.toFixed(2)}`;
  }

  document.getElementById('cartButton').addEventListener('click', function() {
      displayCart();
      document.getElementById('cartModal').classList.remove('hidden');
  });

  document.getElementById('closeCart').addEventListener('click', function() {
      document.getElementById('cartModal').classList.add('hidden');
  });
</script>