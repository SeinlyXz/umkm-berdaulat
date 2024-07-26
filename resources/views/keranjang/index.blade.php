@extends('layouts.app')
@section('title', 'Keranjang')

@section('content')
    <div class="p-10 flex flex-col gap-y-5">
        <h1 class="text-3xl font-semibold">Keranjang Anda</h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @if(count($keranjang) > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Select
                            </th>
                            <th scope="col" class="px-6 py-3" colspan="2">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Qty
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                        </tr>
                    </thead>
                            @foreach($keranjang as $item)
                            <tr class="bg-white border-b hover:bg-gray-50 text-gray-600" data-product-id="{{ $item->product->id }}" data-product-qty="{{ $item->qty }}">
                                <td class="px-4 pt-4 place-content-center">
                                    <input type="checkbox" class="product-select" data-product-id="{{ $item->product->id }}">
                                </td>
                                <td class="px-4 pt-4 place-content-center">
                                    <img src="/storage/product_images/{{$item->product->gambar}}" class="w-full h-32 object-contain" alt="Product Image">
                                </td>
                                <td class="p-4">
                                    <p class="px-6 py-4 font-semibold text-black">
                                        {{$item->product->nama}}
                                    </p>
                                </td>
                                <td class="px-6 font-semibold text-black">
                                    Rp. <span class="product-price">{{$item->product->harga}}</span>
                                </td>
                                <td class="px-6">
                                    <div class="flex items-center">
                                        <button class="quantity-btn decrease inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                            <span class="sr-only">Decrease Quantity</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                            </svg>
                                        </button>
                                        <div>
                                            <input type="number" class="quantity-input bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $item->qty }}" min="1" required />
                                        </div>
                                        <button class="quantity-btn increase inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                            <span class="sr-only">Increase Quantity</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                            </svg> 
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 w-52">
                                    Rp. <span class="total-price">{{ $item->product->harga * $item->qty }}</span>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                @else
                <div class="h-96 flex items-center justify-center">
                    <div class="text-gray-600 dark:text-gray-400">
                        <p>Tidak ada keranjang yang ditambahkan</p>
                    </div>
                </div>
                @endif
        </div>
        <button class="checkout-btn mt-5 bg-blue-500 text-white px-4 py-2 rounded-lg">Checkout</button>
    </div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('tr[data-product-id]');
    
    rows.forEach(row => {
        const decreaseBtn = row.querySelector('.quantity-btn.decrease');
        const increaseBtn = row.querySelector('.quantity-btn.increase');
        const quantityInput = row.querySelector('.quantity-input');
        const productPrice = parseInt(row.querySelector('.product-price').textContent);
        const totalPriceElement = row.querySelector('.total-price');

        function updateTotalPrice() {
            const quantity = parseInt(quantityInput.value);
            const totalPrice = productPrice * quantity;
            totalPriceElement.textContent = totalPrice;
        }

        decreaseBtn.addEventListener('click', () => {
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
                updateTotalPrice();
            }
        });

        increaseBtn.addEventListener('click', () => {
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updateTotalPrice();
        });

        quantityInput.addEventListener('change', updateTotalPrice);
    });

    const checkoutBtn = document.querySelector('.checkout-btn');
    checkoutBtn.addEventListener('click', async () => {
        const selectedProducts = [];
        document.querySelectorAll('.product-select:checked').forEach(checkbox => {
            const row = checkbox.closest('tr');
            const productId = row.dataset.productId;
            const productQty = row.querySelector('.quantity-input').value;
            selectedProducts.push(productId, productQty);
        });

        if (selectedProducts.length > 0) {
            const request = await fetch('{{ route("checkout") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ products: selectedProducts })
            })
            const response = await request.json();
            console.log(response);

        } else {
            alert('Please select at least one product to checkout.');
        }
    });
});

</script>
