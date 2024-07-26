@extends('layouts.guest')
@section('content')
    <div class="flex justify-center h-screen items-center">
        <div class="p-10 w-[32rem] flex flex-col gap-y-5 shadow-xl">
            <h1 class="text-2xl font-bold text-center">Buat Akun Baru</h1>

            <!--Name-->
            <form action="{{ route('register.post') }}" method="post" id="submit">
                @csrf
            </form>
            <div class="">
                <div class="mb-4">
                    <input type="text" id="name" name="name" placeholder="Masukkan Nama Anda" form="submit" class="w-full p-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
      
                <!--Email Addresss-->
                <div class="mb-4">
                    <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" form="submit" class="w-full p-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
      
                <!--Password -->
                <div class="mb-4 relative">
                    <input type="password" id="password" name="password" placeholder="Masukkan Password Anda" class="w-full p-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500" form="submit" required>
                    <button class="absolute right-4 top-2" id="show">show</button>
                </div>
                <p id="warning" class="text-red-500 text-sm"></p>
                <!--Craeate Account-->
                <div class="flex items-center justify-between mb-4">
                    <label for="terms" class="flex items-center">
                        <input type="checkbox" id="terms" name="terms" form="submit" class= "w-4 h-4 border border-gray-300 rounded-sm mr-2" required>
                        <span class="text-gray-700 text-sm">Anda setuju dengan <a href="#" class="text-blue-500 hover:underline underline-offset-2">Syarat dan Ketentuan</a> kami</span>
                    </label>
                </div>
                <div class="flex flex-col">
                  <button type="submit" form="submit" class="w-full py-2 px-4 bg-yellow-400 text-white font-bold rounded-sm hover:bg-yellow-500 duration-500 ease-in-out">Create Your Account</button>
                  <span class="pt-5 text-gray-700 text-sm">
                    Sudah punya akun? <a href="{{route("login")}}" class="text-blue-400 hover:underline underline-offset-2">Login di sini</a>
                  </span>
                </div>
            </div>
        </div>
    </div>
    <script>
      // If password and konfirmasi password are not the same, show alert
      document.getElementById("show").addEventListener("click", function(){
        var password = document.getElementById("password");
        if(password.type === "password"){
          password.type = "text";
          this.textContent = "hide";
        }else{
          password.type = "password";
          this.textContent = "show";
        }
      });
    </script>
@endsection
