{{-- html5 létrehozása --}}
    <!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOT - Ticketing - Users</title>
</head>
<body>
{{-- Body kék div: tartalom(userek) --}}
    <div style="border: solid blue 1px">
        @yield('content')
    </div>

{{-- Body piros div: üzenetek --}}
    <div style="border: solid red 1px">
        @include('messages')
    </div>
</body>
</html>





