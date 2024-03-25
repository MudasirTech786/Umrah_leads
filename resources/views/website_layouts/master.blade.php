<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    @vite(['resources/css/app.css','resources/js/app.js'])  
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}" />  
    <script src="{{ asset('js/app.js') }}"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @include('admin_layouts.partials._script_admin') 
    @yield('custom_styles')
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
 
</head>
<body>
    @include('website_layouts.partials._HeroSlider')
    @yield('content')
    @include('website_layouts.partials._FooterSection')   
</body>
</html>