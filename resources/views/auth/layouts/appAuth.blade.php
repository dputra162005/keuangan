<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">

</head>
<body>

@include('pop.pop')



@yield('content')

<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/mobile.js') }}"></script>
</body>
</html>
