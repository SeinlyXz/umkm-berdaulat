<div>
    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <input type="text" name="name" required placeholder="nama">
        <input type="email" name="email" required placeholder="email">
        <input type="password" name="password" required placeholder="password">
        <button type="submit">Register</button>
    </form>
</div>
