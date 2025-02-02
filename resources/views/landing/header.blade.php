<header class="bg-white dark:bg-gray-800 shadow-md fixed top-0 left-0 right-0 z-10 transition duration-300">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">

        <a href="{{ route('landing', ['search'=>null]) }}"
            class="text-2xl font-bold text-singa dark:text-white flex items-center">
            <img src="{{ asset('images/singa.png') }}" alt="Logo" class="h-8 mr-2">
            SingaMurz
        </a>

        <!-- Search Bar -->
        <div class="w-full max-w-xl mx-4">
            <form action="{{route('landing')}}" method="GET">
                @csrf
                <div class="relative">
                    <input name="search" type="text" placeholder="Search products..."
                        class="w-full px-4 py-2 rounded-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-singa">
                    <button class="absolute right-3 top-2 text-gray-400 dark:text-gray-300 hover:text-singa">
                        <i class='bx bx-search'></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Icons -->
        <div class="flex items-center gap-4">
            <!-- Dark Mode Toggle -->
            <button id="theme-toggle"
                class="p-2 rounded-full bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-white shadow-md transition duration-300">
                <i id="theme-icon" class='bx bx-moon'></i>
            </button>

            <!-- Cart Button -->
            <button id="cartButton" class="text-gray-600 dark:text-gray-300 hover:text-singa text-2xl relative">
                <i class='bx bx-cart'></i>
                <span id="cartCount"
                    class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">0</span>
            </button>
        </div>
    </div>
</header>

<!-- Cart Modal -->
<div id="cartModal"
    class="fixed inset-0 bg-gray-600 bg-opacity-50 dark:bg-gray-900 dark:bg-opacity-70 overflow-y-auto h-full w-full hidden">
    <div
        class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800 transition duration-300">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Shopping Cart</h3>
            <div class="mt-2 px-7 py-3">
                <ul id="cartItems" class="text-left text-gray-900 dark:text-gray-300"></ul>
                <p id="cartTotal" class="mt-4 font-bold text-gray-900 dark:text-gray-200"></p>
            </div>
            <div class="items-center px-4 py-3">
                <button id="closeCart"
                    class="px-4 py-2 bg-gray-500 dark:bg-gray-600 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Dark Mode & Cart Scripts -->
<script>
    // Dark mode toggle script
    const themeToggle = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');

    function updateIcon() {
        if (document.documentElement.classList.contains('dark')) {
            themeIcon.classList.remove('bx-moon');
            themeIcon.classList.add('bx-sun');
        } else {
            themeIcon.classList.remove('bx-sun');
            themeIcon.classList.add('bx-moon');
        }
    }

    function setTheme(mode) {
        if (mode === 'dark') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }
        updateIcon();
    }

    themeToggle.addEventListener('click', () => {
        if (document.documentElement.classList.contains('dark')) {
            setTheme('light');
        } else {
            setTheme('dark');
        }
    });

    // Load theme from localStorage
    if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia(
            '(prefers-color-scheme: dark)').matches)) {
        setTheme('dark');
    } else {
        setTheme('light');
    }

</script>

<script>
    let cart = [];
    let cartCount = 0;

    function addToCart(productName, price) {
        cart.push({
            name: productName,
            price: price
        });
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

    document.getElementById('cartButton').addEventListener('click', function () {
        displayCart();
        document.getElementById('cartModal').classList.remove('hidden');
    });

    document.getElementById('closeCart').addEventListener('click', function () {
        document.getElementById('cartModal').classList.add('hidden');
    });

</script>
