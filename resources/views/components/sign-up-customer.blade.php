<div x-data="{ fullscreenModal: false }" x-init="$watch('fullscreenModal', function(value) {
    if (value === true) {
        document.body.classList.add('overflow-hidden');
    } else {
        document.body.classList.remove('overflow-hidden');
    }
})"
    @keydown.escape="fullscreenModal=false">
    <button @click="fullscreenModal=true"
        class="inline-flex items-center justify-center w-full h-10 px-4 py-2 text-sm font-medium border rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none border-input hover:bg-neutral-100"
        type="button">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1"
            viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
            <path
                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
        </svg>
        <span>Kustomer</span>
    </button>
    <template x-teleport="body">

        <div x-show="fullscreenModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-y-full"
            x-transition:enter-end="translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="translate-y-0"
            x-transition:leave-end="translate-y-full"
            class="flex fixed inset-0 z-[99] w-screen h-screen bg-white">
            <button @click="fullscreenModal=false"
                class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-3 mr-3 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 lg:border-white/20 lg:bg-black/10 hover:lg:bg-black/30 text-neutral-600 lg:text-white hover:bg-neutral-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span>Tutup</span>
            </button>

            <div class="relative flex flex-wrap items-center w-full h-full px-8">

                <div class="relative w-full max-w-sm mx-auto lg:mb-0">
                    <div class="relative text-center">

                        <div class="flex flex-col mb-6 space-y-2">
                            <h1 class="text-2xl font-semibold tracking-tight">
                                Buat akun</h1>
                            <p class="text-sm text-neutral-500">Masukkan e-Mail dan password anda untuk mulai membuat akun</p>
                        </div>
                        <form onsubmit="event.preventDefault();" class="space-y-2">
                            <input type="text" placeholder="name@example.com"
                                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50">
                            <input type="text" placeholder="pass****"
                                class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50">
                            <button type="button"
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

    </template>
</div>
