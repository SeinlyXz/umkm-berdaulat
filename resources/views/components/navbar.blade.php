<header>
    <nav class="bg-slate-500 text-white">
        <ul class="flex justify-between py-5 px-32">
            <li><a href="">Home</a></li>
            <div class="flex gap-x-5">
                <li class="my-auto"><a href="{{ route("home") }}" class={{ (\Request::route()->getName() == "home") ? "underline underline-offset-4" : ""}}>Home</a></li>
                <li class="my-auto"><a href="" class={{ (\Request::route()->getName() == "about") ? "underline underline-offset-4" : ""}}>About</a></li>
                <li>
                    <input type="text" name="search" form="search" class="text-black px-3 py-2 rounded-xl" placeholder="Search">
                </li>
            </div>
        </ul>
    </nav>
    <form hidden id="search" method="get"></form>
</header>