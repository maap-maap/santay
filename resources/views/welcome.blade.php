<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Santay</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body>
    {{--  navbar --}}
    <x-navbar></x-navbar>

    {{-- section main merchant --}}
    <div class="flex flex-col justify-center items-center space-y-36">
        {{-- main merchant list --}}
        @foreach ($merchants as $merchant)
            <section class="flex flex-col justify-center items-center">
                <h1 class="font-semibold text-4xl mb-2 underline"><a
                        href="/merchant/{{ $merchant->id }}">{{ $merchant->name }}</a></h1>
                <div class="w-[700px] h-96 drop-shadow-2xl">
                    <img src="{{ asset('storage/images/merchant/' . $merchant->foto) }}" alt=""
                        class="w-[700px] h-96 rounded-lg drop-shadow-2xl">
                    <div class="w-[500px] m-4 flex flex-col justify-center items-center ml-[100px]">
                        <h2 class="">
                            {{ \Illuminate\Support\Str::words($merchant->desc, 20, ' ...') }}
                        </h2>
                    </div>
                    <hr class="border-gray-400">
                </div>
            </section>
        @endforeach
        {{$merchants->links()}}
    </div>
    {{-- section footer --}}
    <x-footer></x-footer>

</body>

</html>
