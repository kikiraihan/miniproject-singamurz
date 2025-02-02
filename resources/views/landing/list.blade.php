<x-guest-layout>
<main class="container mx-auto px-4 py-8 mt-20">
  {{-- <h1 class="text-3xl font-bold mb-6">Featured Products</h1> --}}
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <!-- Product 1 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img src="https://via.placeholder.com/300x200" alt="Product 1" class="w-full h-48 object-cover">
          <div class="p-4">
              <h2 class="text-xl font-semibold mb-2">Product 1</h2>
              <p class="text-gray-600 mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <div class="flex items-center justify-between">
                  <span class="text-singa font-bold">$19.99</span>
                  <button class="bg-singa text-white px-4 py-2 rounded-full hover:bg-singa flex items-center" onclick="addToCart('Product 1', 19.99)">
                      <i class='bx bx-cart-add mr-2'></i>Add to Cart
                  </button>
              </div>
          </div>
      </div>

      <!-- Product 2 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img src="https://via.placeholder.com/300x200" alt="Product 2" class="w-full h-48 object-cover">
          <div class="p-4">
              <h2 class="text-xl font-semibold mb-2">Product 2</h2>
              <p class="text-gray-600 mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <div class="flex items-center justify-between">
                  <span class="text-singa font-bold">$24.99</span>
                  <button class="bg-singa text-white px-4 py-2 rounded-full hover:bg-singa flex items-center" onclick="addToCart('Product 2', 24.99)">
                      <i class='bx bx-cart-add mr-2'></i>Add to Cart
                  </button>
              </div>
          </div>
      </div>

      <!-- Product 3 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img src="https://via.placeholder.com/300x200" alt="Product 3" class="w-full h-48 object-cover">
          <div class="p-4">
              <h2 class="text-xl font-semibold mb-2">Product 3</h2>
              <p class="text-gray-600 mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <div class="flex items-center justify-between">
                  <span class="text-singa font-bold">$29.99</span>
                  <button class="bg-singa text-white px-4 py-2 rounded-full hover:bg-singa flex items-center" onclick="addToCart('Product 3', 29.99)">
                      <i class='bx bx-cart-add mr-2'></i>Add to Cart
                  </button>
              </div>
          </div>
      </div>

      <!-- Product 4 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img src="https://via.placeholder.com/300x200" alt="Product 4" class="w-full h-48 object-cover">
          <div class="p-4">
              <h2 class="text-xl font-semibold mb-2">Product 4</h2>
              <p class="text-gray-600 mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <div class="flex items-center justify-between">
                  <span class="text-singa font-bold">$34.99</span>
                  <button class="bg-singa text-white px-4 py-2 rounded-full hover:bg-singa flex items-center" onclick="addToCart('Product 4', 34.99)">
                      <i class='bx bx-cart-add mr-2'></i>Add to Cart
                  </button>
              </div>
          </div>
      </div>
  </div>
</main>
</x-guest-layout>