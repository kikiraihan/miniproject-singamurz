@props(['menu'=>[
    ['title' => 'Dashboard', 'icon' => 'bx bx-home', 'link' => route('userpage.dashboard')],
    ['title' => 'Checkout History', 'icon' => 'bx bx-cart', 'link' => route('userpage.checkout')],
]])

<!-- Wrapper -->
<div x-data="{ open: false }" class="relative">
    <!-- Sidebar di Desktop -->
    <aside class="hidden md:block w-64 bg-white dark:bg-gray-800 min-h-screen p-4 shadow-lg">
        <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">Menu</h2>
        <ul class="space-y-2">
            @foreach($menu as $item)
                <li>
                    <a href="{{ $item['link'] }}" class="block p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 flex items-center">
                        <i class="{{ $item['icon'] }} mr-2"></i> 
                        {{ $item['title'] }}
                    </a>
                </li>
            @endforeach
            <!-- Logout -->
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="flex w-full p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 items-center" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class='bx bx-log-out mr-2' ></i>
                        <span>{{ __('Log Out') }}</span>
                    </button>
                </form>
            </li>
        </ul>
    </aside>

    <!-- Tombol Bulat di Mobile/Tablet -->
    <button @click="open = !open" class="md:hidden fixed bottom-6 right-6 bg-blue-500 text-white p-4 rounded-full shadow-lg hover:bg-blue-600 transition">
        <i class='bx bx-menu text-2xl'></i>
    </button>

    <!-- Menu Kecil di Mobile/Tablet -->
    <div x-show="open" @click.away="open = false" class="md:hidden fixed bottom-16 right-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg w-48 p-2 z-30">
        <ul class="space-y-2">
            @foreach( $menu as $item)
                <li>
                    <a href="{{ $item['link'] }}" class="block p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 flex items-center">
                        <i class="{{ $item['icon'] }} mr-2"></i> 
                        {{ $item['title'] }}
                    </a>
                </li>
            @endforeach
            <!-- Logout -->
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="flex w-full p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 items-center" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class='bx bx-log-out mr-2' ></i>
                        <span>{{ __('Log Out') }}</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>