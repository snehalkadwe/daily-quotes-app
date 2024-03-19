<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
            /* Custom styles */
            /* .navbar {
                background-color:#DDFFE7;
            } */
            /* .footer {
                background-color:#DDFFE7 ;
            } */
            .tilted-header {
                background-color: #98D7C2;
                padding-top: 8rem;
                padding-bottom: 6rem
            }
        </style>
        <!-- Scripts -->
        <script>
            setTimeout(function() {
                document.getElementById('successAlert').style.display = 'none';
                document.getElementById('errorAlert').style.display = 'none';
            }, 5000); // 2 minutes
        </script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased bg-gray-100">
        <nav class="navbar p-4 flex justify-between items-center bg-teal-800">
        <div>
            <a href="#about" class="text-teal-200 text-xl">Dashboard</a>
            <a href="#about" class="text-teal-200 text-xl ml-4">About</a>
            <a href="#contact" class="text-teal-200 text-xl ml-4">Contact</a>
        </div>
    </nav>

    <!-- Header section -->
    <header id="about" class="tilted-header text-center text-teal-800 h-screen">
        <div class="flex flex-col justify-center items-center h-full">
            <h1 class="text-4xl font-bold mb-4">Welcome to Quote Generator</h1>
            <p class="text-lg mb-8">Generate inspiring quotes daily!</p>
            <div>
                <p class="text-lg mb-4">Subscribe to get daily quotes:</p>
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <input type="text" name="email" placeholder="Enter your email" class="bg-white text-gray-800 py-3 px-4 rounded mb-4" style="width: 300px;">
                    <button class="bg-teal-800 text-white font-bold py-3 px-8 rounded transition duration-300 ease-in-out hover:bg-teal-500 hover:text-white">
                        Subscribe
                    </button>
                </form>
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert" id="successAlert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg id="closeSuccessAlert" class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.354 5.646a.5.5 0 00-.708 0L10 9.293 5.354 5.646a.5.5 0 00-.708.708L9.293 10l-4.647 4.646a.5.5 0 10.708.708L10 10.707l4.646 4.647a.5.5 0 00.708-.708L10.707 10l4.647-4.646a.5.5 0 000-.708z"/></svg>
                        </span>
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert" id="errorAlert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="closeErrorAlert">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.354 5.646a.5.5 0 00-.708 0L10 9.293 5.354 5.646a.5.5 0 00-.708.708L9.293 10l-4.647 4.646a.5.5 0 10.708.708L10 10.707l4.646 4.647a.5.5 0 00.708-.708L10.707 10l4.647-4.646a.5.5 0 000-.708z"/></svg>
                        </span>
                    </div>
                @endif
            </div>
        </div>
    </header>

    <!-- Footer -->
    <footer id="contact" class="footer p-8 text-teal-200 bg-teal-800">
        <div class="container mx-auto text-center">
            <p class="mb-4">Contact us:</p>
            <p>Email: info@example.com</p>
            <p>Phone: +91-0000000000</p>
        </div>
    </footer>
    </body>
</html>
