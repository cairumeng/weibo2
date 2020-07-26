<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>
    <title>Weibo</title>
</head>

<body>
    @include('layouts.header')

    <div class="container mt-5">
        @include('shared.message')
        @yield('content')
    </div>
    @include('layouts.footer')

</body>

</html>