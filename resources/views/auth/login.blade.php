<div class="">
    @if (Session::has('error'))
        <p>{{ Session::get('message') }}</p>
    @endif
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
</div>
