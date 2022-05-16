<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maksim Framework</title>
</head>
<body>
<h1>Админка</h1>
@if (\App\Support\Session\Session::has('flash_message'))
    <div class="alert alert-success">{{ \App\Support\Session\Session::get('flash_message') }}</div>
@endif
@yield('content')
</body>
</html>