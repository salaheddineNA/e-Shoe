<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Tailwind CSS Test</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
        <div class="md:flex">
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                    Tailwind CSS Test
                </div>
                <a href="#" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">
                    Tailwind CSS is working!
                </a>
                <p class="mt-2 text-gray-500">
                    This is a test page to verify that Tailwind CSS has been successfully installed and configured with your Laravel application.
                </p>
                <div class="mt-4 space-x-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Primary Button
                    </button>
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Success Button
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
