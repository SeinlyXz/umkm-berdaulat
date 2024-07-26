<header class="bg-[#476A80] fixed top-0 inset-0 z-50 h-20 drop-shadow-sm flex justify-between mx-auto px-5 md:px-20 py-3 shadow-xl">
    <a href="/" class="flex md:gap-x-5 gap-x-1">
        <img src="{{ url('logo.svg') }}" alt="UMKM BERDAULAT Logo" class="md:w-10 w-7 h-auto">
        <p class="my-auto text-white md:text-base text-sm">UMKM BERDAULAT</p>
    </a>
    <form class="relative flex items-center my-auto" role="search">
        <label for="search-input" class="absolute cursor-pointer items-center w-4 left-4">
            <img src="{{ url('search.svg') }}" alt="" class="" aria-hidden="true" />
        </label>
        <input type="search" id="search-input" name="search" placeholder="Coba cari kerajinan gabah" class="md:block hidden h-10 w-[40rem] my-auto ps-10 px-4 rounded-3xl text-base text-gray-800 bg-gray-100 border-none focus:outline-none" />
    </form>
    <nav class="relative my-auto">
        <section>
            @if(is_null(Auth::user()))
                <div class="flex gap-x-5">
                    <a href="/register" class="text-white bg-[#fbbf24] px-3 py-2 ease-in-out duration-500 rounded-2xl hover:shadow-2xl flex group w-fit" id="register">
                        <span class="group-hover:-translate-x-3 ease-in-out duration-300 px-3">
                            Buat akun gratis
                        </span>
                        <svg class="ease-in-out opacity-0 group-hover:opacity-100 transition-opacity duration-500 w-6 h-6 -ml-6 text-gray-800 dark:text-white my-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                        </svg>                          
                    </a>
                    <a href="/login" class="text-white my-auto hover:text-[#fbbf24]">
                        Masuk
                    </a>
                </div>
            @else
                <div class="flex items-center md:gap-x-5 gap-x-1">
                    <a href="{{ route('keranjang.index') }}" class="relative">
                        <svg class="md:w-10 md:h-10 h-9 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                        </svg>
                        @if(Auth::user()->keranjang->count() > 0)
                            <div class="absolute md:-top-1 top-0 right-0 bg-[#fbbf24] rounded-full md:px-3 md:py-1 px-2 text-white text-xs">
                                {{Auth::user()->keranjang->count()}}
                            </div>
                        @endif
                    </a>
                    @if(Auth::user()->toko_id)
                        <a href="{{route('toko.index')}}">
                            <svg class="md:w-10 md:h-10 h-9 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M6 12c.263 0 .524-.06.767-.175a2 2 0 0 0 .65-.491c.186-.21.333-.46.433-.734.1-.274.15-.568.15-.864a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 12 9.736a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 16 9.736c0 .295.052.588.152.861s.248.521.434.73a2 2 0 0 0 .649.488 1.809 1.809 0 0 0 1.53 0 2.03 2.03 0 0 0 .65-.488c.185-.209.332-.457.433-.73.1-.273.152-.566.152-.861 0-.974-1.108-3.85-1.618-5.121A.983.983 0 0 0 17.466 4H6.456a.986.986 0 0 0-.93.645C5.045 5.962 4 8.905 4 9.736c.023.59.241 1.148.611 1.567.37.418.865.667 1.389.697Zm0 0c.328 0 .651-.091.94-.266A2.1 2.1 0 0 0 7.66 11h.681a2.1 2.1 0 0 0 .718.734c.29.175.613.266.942.266.328 0 .651-.091.94-.266.29-.174.537-.427.719-.734h.681a2.1 2.1 0 0 0 .719.734c.289.175.612.266.94.266.329 0 .652-.091.942-.266.29-.174.536-.427.718-.734h.681c.183.307.43.56.719.734.29.174.613.266.941.266a1.819 1.819 0 0 0 1.06-.351M6 12a1.766 1.766 0 0 1-1.163-.476M5 12v7a1 1 0 0 0 1 1h2v-5h3v5h7a1 1 0 0 0 1-1v-7m-5 3v2h2v-2h-2Z"/>
                            </svg>
                        </a>
                    @endif
                    <button onclick="toggleModal()" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Open user menu</span>
                        <div class="md:block hidden">
                            <svg class="w-10" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M27.4623 31.5811C30.3756 31.5811 33.1696 30.4237 35.2297 28.3637C37.2897 26.3037 38.447 23.5097 38.447 20.5963C38.447 17.683 37.2897 14.889 35.2297 12.8289C33.1696 10.7689 30.3756 9.61157 27.4623 9.61157C24.5489 9.61157 21.7549 10.7689 19.6949 12.8289C17.6349 14.889 16.4775 17.683 16.4775 20.5963C16.4775 23.5097 17.6349 26.3037 19.6949 28.3637C21.7549 30.4237 24.5489 31.5811 27.4623 31.5811ZM27.4623 28.8349C28.5442 28.8349 29.6155 28.6218 30.615 28.2078C31.6146 27.7937 32.5228 27.1869 33.2878 26.4219C34.0528 25.6568 34.6597 24.7486 35.0737 23.7491C35.4877 22.7495 35.7008 21.6782 35.7008 20.5963C35.7008 19.5144 35.4877 18.4431 35.0737 17.4436C34.6597 16.444 34.0528 15.5358 33.2878 14.7708C32.5228 14.0058 31.6146 13.3989 30.615 12.9849C29.6155 12.5709 28.5442 12.3578 27.4623 12.3578C25.2773 12.3578 23.1818 13.2257 21.6367 14.7708C20.0917 16.3158 19.2237 18.4113 19.2237 20.5963C19.2237 22.7813 20.0917 24.8768 21.6367 26.4219C23.1818 27.9669 25.2773 28.8349 27.4623 28.8349Z" fill="white"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M54.9237 27.4619C54.9237 42.629 42.629 54.9237 27.4619 54.9237C12.2947 54.9237 0 42.629 0 27.4619C0 12.2947 12.2947 0 27.4619 0C42.629 0 54.9237 12.2947 54.9237 27.4619ZM40.6847 48.3466C36.7316 50.856 32.1443 52.1851 27.4619 52.1775C22.6677 52.185 17.9758 50.7914 13.963 48.1681C13.6334 47.7562 13.2984 47.3305 12.9606 46.8911C12.5682 46.3763 12.3563 45.7466 12.3578 45.0992C12.3578 43.6204 13.4206 42.3805 14.8418 42.1732C24.2406 40.8001 30.712 40.9182 40.1231 42.2212C40.8047 42.32 41.4275 42.6621 41.8765 43.1843C42.3255 43.7065 42.5704 44.3735 42.5659 45.0622C42.5659 45.7212 42.3393 46.3611 41.9301 46.8609C41.5086 47.3744 41.0926 47.8701 40.6847 48.3466ZM45.2915 44.5788C45.0718 42.0084 43.1206 39.8636 40.4994 39.5011C30.8658 38.1679 24.1321 38.0402 14.4449 39.4558C11.8086 39.8403 9.86567 42.0043 9.63499 44.5816C5.20721 39.9832 2.73746 33.8455 2.74619 27.4619C2.74619 13.8119 13.8119 2.74619 27.4619 2.74619C41.1118 2.74619 52.1775 13.8119 52.1775 27.4619C52.1863 33.8441 49.7176 39.9807 45.2915 44.5788Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="md:hidden block">
                            <svg class="w-10 h-10 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="1" d="M5 7h14M5 12h14M5 17h14"/>
                            </svg>
                        </div>
                    </button>
                </div>
                <x-navbar-dropdown />
            @endif
        </section>
    </nav>
</header>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(1rem);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    let isOpen = false;
    const modal = document.getElementById("menu-modal");
    const profileButton = document.querySelector('button[onclick="toggleModal()"]');

    function toggleModal() {
        isOpen = !isOpen;
        if (isOpen) {
            openModal();
        } else {
            closeModal();
        }
    }

    function openModal() {
        modal.classList.remove("opacity-0","pointer-events-none");
        modal.classList.add("ease-in-out", "duration-300", "translate-y-3", "opacity-100");
        profileButton.setAttribute('aria-expanded', 'true');
    }

    function closeModal() {
        modal.classList.remove("ease-in-out", "duration-300", "opacity-100", "translate-y-3");
        modal.classList.add("opacity-0","pointer-events-none");
        profileButton.setAttribute('aria-expanded', 'false');
    }

    document.addEventListener('click', function(event) {
        if (isOpen && !modal.contains(event.target) && event.target !== profileButton) {
            toggleModal();
        }
    });

    modal.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    profileButton.addEventListener('click', function(event) {
        event.stopPropagation();
    });
</script>