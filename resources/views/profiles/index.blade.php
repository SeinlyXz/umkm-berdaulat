@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <style>
        .selected {
            background-color: #fbbf24;
            /* Lighter yellow color for selected items */
        }
    </style>
    @if (Session::has('success'))
        <div class="bg-blue-500 w-full text-white px-5 py-5 text-center">
            <p>
                {{ Session::get('success') }}
            </p>
        </div>
    @endif
    <!-- Profile -->
    <div class="hidden" id="edit-profile-modal">
        <x-edit-profile-modal />
        <div class="w-full h-full absolute top-0 bg-gray-400 bg-opacity-35 inset-0 z-0"></div>
    </div>
    <div class="min-h-screen flex flex-col">
        <!-- Main Content -->
        <div class="flex">
            <!-- Sidebar -->
            <x-profile-sidebar/>
            <!-- Profile Details -->
            <div class="flex-1 md:p-8 py-5">
                <div class="bg-white p-6 rounded shadow">
                    <div class="flex items-center mb-4">
                        <div class="">
                            <img src="https://t3.ftcdn.net/jpg/02/43/12/34/360_F_243123463_zTooub557xEWABDLk0jJklDyLSGl2jrr.jpg" alt="" class="object-cover w-16 h-16 rounded-full">
                        </div>
                        <div class="ml-4">
                            <div class="text-xl font-bold flex gap-x-4">
                                {{$user->name}}
                                <button onclick="openProfileModal()">
                                    <p class="text-sm text-gray-400 my-auto">
                                        change
                                    </p>
                                </button>
                            </div>
                            <div class="text-gray-600 text-sm">{{$user->email}} | +62 81234567890</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 md:text-base text-sm">
                        <div class="p-4 bg-gray-100 rounded selected cursor-pointer">
                            <div class="font-bold">Alamat 1</div>
                            <div class="line-clamp-2">Jl. Ring Road Utara, Ngringin, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa
                                Yogyakarta 55281</div>
                        </div>
                        <div class="p-4 bg-gray-100 rounded hover:bg-[#fbbf24] cursor-pointer">
                            <div class="font-bold">Alamat 2</div>
                            <div class="line-clamp-2">Jl. Ring Road Utara, Ngringin, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa
                                Yogyakarta 55281</div>
                        </div>
                        <div class="p-4 bg-gray-100 rounded hover:bg-[#fbbf24] cursor-pointer">
                            <div class="font-bold">Alamat 3</div>
                            <div class="line-clamp-2">Jl. Ring Road Utara, Ngringin, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa
                                Yogyakarta 55281</div>
                        </div>
                        <div class="p-4 bg-gray-100 rounded hover:bg-[#fbbf24] cursor-pointer">
                            <div class="font-bold">Alamat 4</div>
                            <div class="line-clamp-2">Jl. Ring Road Utara, Ngringin, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa
                                Yogyakarta 55281</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function selectItem(element) {
            var items = document.querySelectorAll('.cursor-pointer');
            items.forEach(item => {
                item.classList.remove('selected');
            });
            element.classList.add('selected');
        }

        function toggleDropdown() {
            var dropdown = document.getElementById('paymentDropdown');
            dropdown.classList.toggle('hidden');
        }

        function selectPaymentMethod(method) {
            alert("Selected Payment Method: " + method);
            var dropdown = document.getElementById('paymentDropdown');
            dropdown.classList.add('hidden');
        }

        document.addEventListener('click', function(event) {
            var isClickInside = document.querySelector('.relative').contains(event.target);
            if (!isClickInside) {
                var dropdown = document.getElementById('paymentDropdown');
                dropdown.classList.add('hidden');
            }
        });

        function openProfileModal() {
            var modal = document.getElementById('edit-profile-modal');
            if(modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
            } else {
                modal.classList.add('hidden');
            }
        }

    </script>

@endsection
