<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Produk - Desain Elegan</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>

<body class="bg-white text-gray-900">
    <x-navbar></x-navbar>
    <!-- Kontainer Pencarian -->
    <div class="max-w-6xl mx-auto p-8">

        <!-- Header Pencarian -->
        <div class="flex justify-between items-center">
            <h1 class="text-4xl font-semibold text-gray-900">Cari Produk</h1>
        </div>

        <!-- Pencarian -->
        <form class="mt-8 flex items-center justify-between bg-white p-4 rounded-lg shadow-lg">
            <input type="text" placeholder="Cari produk..."
                class="w-full p-3 bg-gray-100 text-gray-900 rounded-lg focus:ring-2 focus:ring-blue-500 transition duration-300"
                name="s" />
            <button
                class="ml-4 bg-blue-500 px-6 py-3 rounded-lg hover:bg-blue-400 transition duration-300">Cari</button>
        </form>
        <div class="flex flex-col justify-center items-center space-y-36 mt-8">
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
            {{ $merchants->links() }}
        </div>
        <!-- Hasil Pencarian -->
    </div>

</body>

</html>
