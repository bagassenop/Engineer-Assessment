<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" href="">
    <title>Todos</title>
</head>

<body>
    <div class="text-center flex justify-center pt-10">
        <div class="w-1/3 border-gray-400 rounded py-4">
            @yield('content')
        </div>
    </div>
</body>

</html>
