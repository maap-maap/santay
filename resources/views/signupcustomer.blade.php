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

        <div
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-y-full"
            x-transition:enter-end="translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="translate-y-0"
            x-transition:leave-end="translate-y-full"
            class="flex fixed inset-0 z-[99] w-screen h-screen bg-white">
            <button @click="(() => window.location.href = '{{route('merchant.index')}}')()"
                class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-3 mr-3 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 lg:border-white/20 lg:bg-black/10 hover:lg:bg-black/30 text-neutral-600 lg:text-white hover:bg-neutral-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span>Kembali</span>
            </button>

            <div class="relative flex flex-wrap items-center w-full h-full px-8">

                <div class="relative w-full max-w-sm mx-auto lg:mb-0">
                    <div class="relative text-center">

                        <div class="flex flex-col mb-6 space-y-2">
                            <h1 class="text-2xl font-semibold tracking-tight">
                                Buat akun</h1>
                            <p class="text-sm text-neutral-500">Masukkan e-Mail dan password anda untuk mulai membuat akun</p>
                        </div>
                        <form class="space-y-2" method="POST" action="{{route("store.cust")}}">
                            @csrf
                           <input id="usernamePembeli" type="text" placeholder="Masahiko" name="username" required
                                    class="@if ($errors->has('username')) flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-rose-700 ring-offset-background placeholder:text-rose-400 focus:border-rose-700  focus:ring-2 focus:ring-offset-2 focus:ring-rose-700 disabled:cursor-not-allowed disabled:opacity-50 @else w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50 @endif ">
                                @error('username')
                                    <p class="text-xs text-rose-700 dark:text-rose-700" id="hs-textarea-helper-text">
                                        {{ $message }}</p>
                                @enderror
                                <input id="emailPembeli" type="email" placeholder="login@masahiko.com"
                                    name="email" required
                                    class="@if ($errors->has('email')) flex  w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-rose-700 ring-offset-background placeholder:text-rose-400 focus:border-rose-700  focus:ring-2 focus:ring-offset-2 focus:ring-rose-700 disabled:cursor-not-allowed disabled:opacity-50 @else w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50 @endif ">
                                @error('email')
                                    <p class="text-xs text-rose-700 dark:text-rose-700" id="hs-textarea-helper-text">
                                        {{ $message }}</p>
                                @enderror
                                <input type="password" name="password" placeholder="pass****"
                                    class="@if ($errors->has('password')) flex  w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-rose-700 ring-offset-background placeholder:text-rose-400 focus:border-rose-700  focus:ring-2 focus:ring-offset-2 focus:ring-rose-700 disabled:cursor-not-allowed disabled:opacity-50 @else w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50 @endif ">
                                @error('password')
                                    <p class="text-xs text-rose-700 dark:text-rose-700" id="hs-textarea-helper-text">
                                        {{ $message }}</p>
                                @enderror
                                <div id="bioPembeli" class="max-w-sm space-y-3">
                                    <textarea
                                        class="@if ($errors->has('bio_pembeli')) py-3 px-4 block w-full border-rose-700 rounded-lg text-sm placeholder:text-rose-400 focus:border-rose-700 focus:ring-rose-700 disabled:opacity-50 disabled:pointer-events-none @else py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none @endif "
                                        rows="3" placeholder="deskripsikan tentang UMKM anda" name="bio_pembeli"></textarea>
                                    @error('bio_pembeli')
                                        <p class="text-xs text-rose-700 dark:text-rose-700" id="hs-textarea-helper-text">
                                            {{ $message }}</p>
                                    @enderror
                                </div>
                            <button type="submit"
                                class="inline-flex items-center justify-center w-full h-10 px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-neutral-950 hover:bg-neutral-900 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none">
                                Masuk
                            </button>

                        </form>
                    </div>
                    <p class="mt-6 text-sm text-center text-neutral-500">
                        Sudah punya akun? <a href="#_"
                            class="relative font-medium text-blue-600 group"><span>Login</span><span
                                class="absolute bottom-0 left-0 w-0 group-hover:w-full ease-out duration-300 h-0.5 bg-blue-600"></span></a>
                    </p>
                </div>
            </div>
            <div
                class="relative top-0 bottom-0 right-0 flex-shrink-0 hidden w-1/3 overflow-hidden bg-cover lg:block">
                <div
                    class="absolute inset-0 z-20 w-full h-full opacity-70 bg-gradient-to-t from-black">
                </div>
                <img src="{{ asset('storage/images/static/login.png') }}"
                    class="z-10 object-cover w-full h-full" />
            </div>
        </div>
</div>
