<!DOCTYPE html>
<html>
<head>
    <title>Admin Forgot Password</title>
</head>
<body>
    <h2>Reset Password</h2>

    @if(session('status'))
        <div>{{ session('status') }}</div>
    @endif

    @if($errors->any())
        <div>{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('admin.password.email') }}">
        @csrf
        <label>Email</label>
        <input type="email" name="email" required>
        <br>
        <button type="submit">Send Password Reset Link</button>
    </form>
</body>
</html>
