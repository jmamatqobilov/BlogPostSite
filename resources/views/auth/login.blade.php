<div>
    <form action="{{ route('login-route') }}" method="POST">
        @csrf
        <input type="email" name="email"><br>
        <input type="password" name="password"><br>
        <button>Login</button>
    </form>
</div>