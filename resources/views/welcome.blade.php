<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @vite(['resources/js/app.js','resources/css/app.css'])
</head>

<body class="antialiased">
    {{-- <div id="App"></div> --}}

    <div class="flex justify-center items-center h-screen w-screen">
        <div class="w-2/6">
            <div class="mb-12">
                @forelse($errors->all() as $error)
                <p>{{$error}}</p>

                @empty

                @endforelse
            </div>
            <form action="/chirps" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="flex flex-col gap-4">
                    <label>Avatar</label>
                    <input type="file" name="avatar" />
                </div>
                <div class="flex flex-col gap-4">
                    <label>Message</label>
                    <textarea name="message" rows="10"></textarea>
                </div>
                <div>
                    <button class="bg-blue-400 py-2 px-6 rounded-md">Submit</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
