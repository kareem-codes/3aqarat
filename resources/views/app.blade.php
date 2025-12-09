<!DOCTYPE html>
<html lang="ar-EG" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ env('APP_NAME', '') }}</title>
    
    <meta name="description" content="عقارات - منصتك العقارية الموثوقة">
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
    @inertiaHead
</head>

<body class="antialiased">
    @inertia
</body>

</html>