<div>
    <form action="{{ route('register-route') }}" method="POST">
        @csrf
        <input type="text" name="name"><br>
        <input type="email" name="email"><br>
        <input type="password" name="password"><br>
        <button>Register</button>
    </form>
</div>