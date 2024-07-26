<section class="flex py-5 justify-between">
    <section class="flex md:gap-x-5 gap-x-2 md:text-xl">
        <button class="hover:text-[#FACF00] {{url()->current() == "http://127.0.0.1:8000/profile" ? "text-[#FACF00]" : ""}}">Beranda</button>
        <button class="hover:text-[#FACF00]">Produk</button>
        <button class="hover:text-[#FACF00]">Ulasan</button>
    </section>
    <section>
        <input type="text" name="search" placeholder="Cari di toko" class="px-3 py-2 md:w-72 w-32 md:text-base text-sm focus:outline-none border border-b-[#FACF00] border-t-0 border-r-0 border-l-0">
    </section>
</section>