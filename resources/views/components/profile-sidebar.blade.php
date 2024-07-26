<div class="w-64 bg-yellow-500 py-5 h-screen md:block hidden">
    <ul>
        <li class="mb-4 hover:bg-[#fbbf24] {{ request()->is('profile') ? 'selected' : '' }} px-3">
            <div class="cursor-pointer text-white font-bold p-2  rounded">
                Profile Saya
            </div>
        </li>
        <li class="mb-4 hover:bg-[#fbbf24] {{ request()->is('profile/orders') ? 'selected' : '' }} px-3">
            <div class="cursor-pointer text-white p-2 rounded">
                Pesanan Saya
            </div>
        </li>
        <li class="mb-4 relative hover:bg-[#fbbf24] px-3">
            <div onclick="toggleDropdown()" class="cursor-pointer text-white p-2 rounded">Metode Pembayaran
            </div>
            <div id="paymentDropdown" class="hidden bg-white text-gray-800 rounded shadow mt-2 absolute w-full">
                <div onclick="selectPaymentMethod('QRIS')" class="p-2 cursor-pointer hover:bg-gray-100">QRIS
                </div>
                <div onclick="selectPaymentMethod('Bank Transfer')"
                    class="p-2 cursor-pointer hover:bg-gray-100">Bank
                    Transfer</div>
                <div onclick="selectPaymentMethod('Other')" class="p-2 cursor-pointer hover:bg-gray-100">Other
                </div>
            </div>
        </li>
        <li class="mb-4 hover:bg-[#fbbf24] {{ request()->is('profile/newsletter') ? 'selected' : '' }} px-3">
            <div onclick="selectItem(this)" class="cursor-pointer text-white p-2 rounded">Newsletter</div>
        </li>
        <a href="/logout">
            <li class="mb-4 hover:bg-[#fbbf24] px-3">
                <div onclick="selectItem(this)" class="cursor-pointer text-white p-2 rounded">Logout</div>
            </li>
        </a>
    </ul>
</div>