<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Wired</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        html {
            overflow:   scroll;
        }

        ::-webkit-scrollbar {
            width: 0px;
            display: none; /* make scrollbar dissapear */
        }
    </style>
</head>
<body>
    @yield('topbar')
    @yield('content')
</body>
</html>