<div class="absolute bg-white border top-12 border-gray-200 w-60 -right-4 overflow-hidden opacity-0 rounded-lg shadow-xl pointer-events-none" id="menu-modal">
    <ul class="flex flex-col gap-y-4">
        <a href="{{route("profile.index")}}" class="hover:bg-slate-300 cursor-pointer px-3 py-2">
            <li class="w-full group hover:bg-slate-300">
                Profile Anda
            </li>
        </a>
        @if(Auth::user()->toko_id)
            <a href="{{route("toko.index")}}" class="hover:bg-slate-300 cursor-pointer px-3 py-2">
                <li class="w-full group hover:bg-slate-300 ">
                    Toko Anda
                </li>
            </a>
        @else
            <a href="{{route("toko.create")}}" class="hover:bg-slate-300 cursor-pointer px-3 py-2">
                <li class="w-full group hover:bg-slate-300 ">
                    Buat Toko
                </li>
            </a>
        @endif
        <a href="#" class="hover:bg-slate-300 cursor-pointer px-3 py-2">
            <li class="w-full group hover:bg-slate-300 ">
                Pesanan Anda
            </li>
        </a>
        <a href="/logout" class="hover:bg-slate-300 cursor-pointer px-3 py-2">
            <li class="w-full group hover:bg-slate-300 ">
                Logout
            </li>
        </a>
    </ul>
</div>
