<!DOCTYPE html>
<html>
<head>
    <title>Reset Password Akun CBT Yappenda!</title>
</head>
<body>
<h1>Halo kak {{ $data['name'] }}</h1>
<p>Klik Link berikut untuk reset akun CBT kamu -> <a href="{{ url('/reset-password/'.$data['tokens']) }}">{{ url('/reset-password/'.$data['tokens']) }}</p>
</body>
</html>