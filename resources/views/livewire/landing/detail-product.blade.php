<main class="container mx-auto px-4 lg:px-36 py-8 mt-20">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden col-span-3 transition duration-300">
        <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
            <!-- Image Section -->
            <div class="col-span-1 md:col-span-3">
                <img class="h-64 w-full object-cover md:h-full" src="{{$prod->image_url}}" alt="Product image">
            </div>

            <!-- Product Details -->
            <div class="col-span-2 md:col-span-3 p-6 flex flex-col justify-between">
                <div>
                    <a href="#" class="block text-lg leading-tight font-medium text-singa dark:text-singa-secondary hover:underline">
                        {{$prod->name}}
                    </a>

                    <!-- Star Ratings -->
                    <div class="flex items-center mt-2">
                        <i class='bx bxs-star text-yellow-500'></i>
                        <i class='bx bxs-star text-yellow-500'></i>
                        <i class='bx bxs-star text-yellow-500'></i>
                        <i class='bx bxs-star text-yellow-500'></i>
                        <i class='bx bxs-star-half text-yellow-500'></i>
                    </div>

                    <p class="mt-2 text-gray-500 dark:text-gray-400">{{$prod->short_description}}</p>

                    <!-- Price -->
                    <div class="mt-4">
                        <span class="text-singa dark:text-singa-secondary font-bold text-xl">Rp. {{$prod->price}}</span>
                    </div>
                </div>

                <!-- Category -->
                <div class="uppercase tracking-wide text-sm text-indigo-500 dark:text-indigo-400 font-semibold mt-2">
                    Stock {{$prod->stock}}
                </div>

                <div class="flex justify-between">
                    <!-- Quantity Selector -->
                    <div class="mt-4 flex items-center">
                        <span class="mr-2 text-gray-600 dark:text-gray-300">Quantity:</span>
                        <select id="quantity"
                            class="rounded border appearance-none border-gray-300 dark:border-gray-600 py-2 focus:outline-none focus:ring-2 focus:ring-singa dark:focus:ring-singa-secondary text-base pl-3 pr-10 bg-white dark:bg-gray-700 dark:text-gray-200">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>

                    <!-- Add to Cart Button -->
                    <div class="mt-6">
                        <button class="bg-singa dark:bg-singa-secondary text-white px-4 py-2 rounded-full hover:bg-opacity-90 dark:hover:bg-opacity-90 flex items-center transition duration-300"
                            wire:click="$dispatch('addToCart', ['Product Name', 20.99])">
                            {{-- onclick="addToCart('{{ $item->name }}', {{ $item->price }})" --}}
                            <i class='bx bx-cart-add mr-2'></i>Add to Cart
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4 mt-2 flex flex-col md:flex-row items-center">
        <img class="h-16 w-16 object-cover rounded-full"
            src="https://down-id.img.susercontent.com/file/id-11134216-7r990-luehvy7ks74656@resize_w160_nl.webp"
            alt="Store image">
        <div class="ml-4">
            <h3 class="text-lg font-semibold text-singa dark:text-singa-secondary">{{$prod->seller->shop_name}}</h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm">terbaik</p>
        </div>
    </div>

    <div class="mt-8 px-4 md:px-0">
        <h2 class="text-2xl font-bold mb-4 text-singa dark:text-singa-secondary">Product Description</h2>
        <p class="text-gray-600 dark:text-gray-300 text-justify">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec condimentum quam. Fusce pellentesque 
            faucibus lorem at viverra. Integer at feugiat odio. In placerat euismod risus, proin erat ornare malesuada. 
            Nunc interdum augue eget porta mollis. Sed bibendum sem iaculis, pellentesque massa facilisis, mollis urna. 
            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Quisque id nulla 
            volutpat, ultricies mauris et, aliquam lectus.
        </p>
    
        <h3 class="text-xl font-semibold mt-6 text-singa dark:text-singa-secondary">Detail Product:</h3>
        <ul class="text-gray-600 dark:text-gray-300 list-disc list-inside">
            <li><strong>Bahan:</strong> Lorem Ipsum</li>
            <li><strong>Ukuran:</strong> 170 cm x 60 cm</li>
            <li><strong>Finishing:</strong> Neci / jahit tepi</li>
            <li><strong>Kemiripan:</strong> 90% (luminis effectus)</li>
        </ul>
    
        <h3 class="text-xl font-semibold mt-6 text-singa dark:text-singa-secondary">Catatan Toko:</h3>
        <ol class="text-gray-600 dark:text-gray-300 list-decimal list-inside">
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
            <li>Chat respondetur secundum ordinem.</li>
            <li>Mandatum ante horam XII meridies missum eodem die expeditur.</li>
            <li>Mandata in die dominico vel feriato die proximo tractabuntur.</li>
            <li>Fac video unboxing sine intermissione cum fasciculum aperis.</li>
            <li>Fac ut recta data emptoris impleas.</li>
            <li>Omnis forma refundi per applicationem Lorem Ipsum procedetur.</li>
            <li>Mandatum processum revocari non potest.</li>
        </ol>
    
        <p class="text-gray-600 dark:text-gray-300 mt-4">
            Gratias et felix shopping!
        </p>
    </div>
</main>
