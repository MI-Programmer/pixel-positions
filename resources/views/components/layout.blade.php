<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>Pixel Positions</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white font-hanken-grotesk pb-20">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/10">
            <div>
                <a href="/" class="font-sans font-bold underline">P2 Inc.</a>
            </div>
            <div class="space-x-2 md:space-x-6 font-medium">
                <a href="">Jobs</a>
                <a href="">Careers</a>
                <a href="">Salaries</a>
                <a href="">Companies</a>
            </div>

            <div class="space-x-3 font-medium flex">
                @auth
                    <a href="/jobs/create">Post a Job</a>
                    <form action="/logout" method="post">
                        @csrf
                        @method('DELETE')

                        <button>Log Out</button>
                    </form>
                @endauth

                @guest
                    <a href="/register">Sign Up</a>
                    <a href="/login">Log In</a>
                @endguest
            </div>
        </nav>

        <main class="mt-10 mx-auto max-w-[986px]">{{ $slot }}</main>
    </div>
</body>

</html>
