<div class="fixed z-50 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white px-10 py-5 shadow-xl rounded-lg w-96 items-center" id="profile-modal">
    <form action="">
        <div class="flex flex-col gap-y-3">
            <h1 class="text-2xl font-bold">Ubah Username</h1>
            <input type="text" name="username" class="px-3 py-2 w-full border border-gray-300 rounded-xl" placeholder="{{$user->name}}" value="{{$user->name}}">
            <button type="submit" class="w-full bg-[#476A80] py-2 rounded-xl text-white">Ubah</button>
        </div>
    </form>
    <button onclick="openProfileModal()" class="absolute top-3 right-3 px-2 text-black rounded-full">X</button>
</div>

<script>
    let isOpen = true;
    function openProfileModal() {
        if (isOpen) {
            document.getElementById("profile-modal").classList.remove("hidden");
            isOpen = false;
        } else {
            document.getElementById("profile-modal").classList.add("hidden");
            isOpen = true;
        }
    }
</script>