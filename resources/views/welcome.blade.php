<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Wired</title>
</head>
<body>
    <h1>Welcome to The Wired</h1>
    <ul>
        <li><a href="{{ url('/about') }}">About</a></li>
        <li><a href="{{ url('/contacts') }}">Contacts</a></li>
        <li><a href="{{ route('login.index') }}">Log in</a></li>
    </ul>
</body>
</html>