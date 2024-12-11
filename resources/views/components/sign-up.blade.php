<div class="inline-flex items-center ml-5 space-x-6 lg:justify-end">
    <div x-data="{ fullscreenModal: false }" x-init="$watch('fullscreenModal', function(value) {
        if (value === true) {
            document.body.classList.add('overflow-hidden');
        } else {
            document.body.classList.remove('overflow-hidden');
        }
    })" @keydown.escape="fullscreenModal=false">
        <a @click="fullscreenModal=true" class="relative inline-block text-lg group">
            <span
                class="relative z-10 block px-5 py-3 overflow-hidden font-medium leading-tight text-gray-800 transition-colors duration-300 ease-out border-2 border-gray-900 rounded-lg group-hover:text-white">
                <span class="absolute inset-0 w-full h-full px-5 py-3 rounded-lg bg-gray-50"></span>
                <span
                    class="absolute left-0 w-48 h-48 -ml-2 transition-all duration-300 origin-top-right -rotate-90 -translate-x-full translate-y-12 bg-gray-900 group-hover:-rotate-180 ease"></span>
                <span class="relative">Sign up</span>
            </span>
            <span
                class="absolute bottom-0 right-0 w-full h-12 -mb-1 -mr-1 transition-all duration-200 ease-linear bg-gray-900 rounded-lg group-hover:mb-0 group-hover:mr-0"
                data-rounded="rounded-lg"></span>
        </a>

        <template x-teleport="body">

            <div x-show="fullscreenModal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="translate-y-full" x-transition:enter-end="translate-y-0"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-y-0"
                x-transition:leave-end="translate-y-full" class="flex fixed inset-0 z-[99] w-screen h-screen bg-white">
                <button @click="fullscreenModal=false"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-3 mr-3 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 lg:border-white/20 lg:bg-black/10 hover:lg:bg-black/30 text-neutral-600 lg:text-white hover:bg-neutral-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>Tutup</span>
                </button>

                <div class="relative flex flex-wrap items-center w-full h-full px-8 overflow-y-auto">

                    <div class="relative w-full max-w-sm mx-auto lg:mb-0">
                        <div class="relative text-center">

                            <div class="flex flex-col mb-6 space-y-2">
                                <h1 class="text-2xl font-semibold tracking-tight">Buat akun UMKM anda
                                </h1>
                                <p class="text-sm text-neutral-500">Masukkan data diri anda untuk mulai membuat akun
                                    anda</p>
                            </div>
                            <div class="relative py-6">
                                <div class="absolute inset-0 flex items-center"><span class="w-full border-t"></span>
                                </div>
                                <div class="relative flex justify-center text-xs uppercase">
                                    <span class="px-2 bg-white text-neutral-500">Atau masuk sebagai kustomer</span>
                                </div>
                            </div>
                            <button @click="(() => window.location.href = '{{ route('page_signup.customer') }}')()"
                                class="inline-flex items-center justify-center w-full h-10 px-4 py-2 text-sm font-medium border rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none border-input hover:bg-neutral-100"
                                type="button">
                                <img src="{{ asset('storage/images/pembeli/buyer.png') }}" alt="buyer" width="26px"
                                    class="rounded-full mr-2">
                                <span>Kustomer</span>
                            </button>
                            <div class="mt-8"></div>
                            <hr>
                            <form method="POST" action="{{ route('store.seller') }}" class="space-y-2" enctype="multipart/form-data">
                                @csrf
                                <h1 class="bold text-lg mt-4">Profil Anda</h1>
                                <input id="usernamePenjual" type="text" placeholder="Masahiko" name="username" required
                                    class="@if ($errors->has('username')) flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-rose-700 ring-offset-background placeholder:text-rose-400 focus:border-rose-700  focus:ring-2 focus:ring-offset-2 focus:ring-rose-700 disabled:cursor-not-allowed disabled:opacity-50 @else w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50 @endif ">
                                @error('username')
                                    <p class="text-xs text-rose-700 dark:text-rose-700" id="hs-textarea-helper-text">
                                        {{ $message }}</p>
                                @enderror
                                <input id="emailPenjual" type="email" placeholder="daftardulu@masahiko.com"
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
                                <div id="bioPenjual" class="max-w-sm space-y-3">
                                    <textarea
                                        class="@if ($errors->has('bio_penjual')) py-3 px-4 block w-full border-rose-700 rounded-lg text-sm placeholder:text-rose-400 focus:border-rose-700 focus:ring-rose-700 disabled:opacity-50 disabled:pointer-events-none @else py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none @endif "
                                        rows="3" placeholder="deskripsikan tentang UMKM anda" name="bio_penjual"></textarea>
                                    @error('bio_penjual')
                                        <p class="text-xs text-rose-700 dark:text-rose-700" id="hs-textarea-helper-text">
                                            {{ $message }}</p>
                                    @enderror
                                </div>

                                <h1 class="bold text-lg mt-4">Profil Merchant Anda</h1>
                                <input id="nameMerchant" type="text" ppembelilaceholder="Toko Pak masahiko"
                                    name="name_merchant"
                                    class="@if ($errors->has('name_merchant')) flex  w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-rose-700 ring-offset-background placeholder:text-rose-400 focus:border-rose-700  focus:ring-2 focus:ring-offset-2 focus:ring-rose-700 disabled:cursor-not-allowed disabled:opacity-50 @else w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50 @endif ">
                                @error('name_merchant')
                                    <p class="text-xs text-rose-700 dark:text-rose-700" id="hs-textarea-helper-text">
                                        {{ $message }}</p>
                                @enderror
                                <hr>
                                <div id="descMerchant" class="max-w-sm space-y-3">
                                    <textarea
                                        class="@if ($errors->has('desc_merchant')) py-3 px-4 block w-full border-rose-700 rounded-lg text-sm placeholder:text-rose-400 focus:border-rose-700 focus:ring-rose-700 disabled:opacity-50 disabled:pointer-events-none @else py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none @endif "
                                        rows="3" placeholder="deskripsikan tentang UMKM anda" name="desc_merchant"></textarea>
                                    @error('desc_merchant')
                                        <p class="text-xs text-rose-700 dark:text-rose-700" id="hs-textarea-helper-text">
                                            {{ $message }}</p>
                                    @enderror
                                </div>
                                <div x-data="{
                                    layanans: [''] // Menyimpan input yang ditambahkan
                                }" class="max-w-md mx-auto">
                                    <h2 class="text-xl ibold mb-4 mt-4">Tambah Layanan UMKM</h2>

                                    <div class="space-y-4">
                                        <!-- Menampilkan input teks yang bisa ditambahkan -->
                                        <template x-for="(layanan, index) in layanans" :key="index">
                                            <div class="input-container">
                                                <label :for="'input-' + index"
                                                    class="block text-sm font-bold text-gray-700">Layanan ke-<span
                                                        x-text="index + 1"></span></label>
                                                <input :id="'layanan-' + index" :name="'layanan-' + index"
                                                    x-model="layanans[index]" type="text"
                                                    class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50"
                                                    placeholder="Masukkan sesuatu...">
                                            </div>
                                        </template>

                                        <!-- Tombol untuk menambah input -->
                                        <button @click="layanans.push('')" type="button"
                                            class="inline-flex items-center justify-center w-full h-10 px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-neutral-950 hover:bg-neutral-900 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none">

                                            Tambah Layanan
                                        </button>
                                    </div>

                                </div>
                                <hr>
                                <input type="file" name="bg_merchant" id="file-input"
                                    placeholder="pilih file logo"
                                    class="
                                      @if ($errors->has('bg_merchant')) mt-4 block w-full border border-rose-700 shadow-sm rounded-lg text-sm focus:z-10 focus:border-rose-700 focus:ring-rose-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-rose-700 dark:text-rose-700
                                      file:bg-gray-50 file:border-0
                                      file:me-4
                                      file:py-3 file:px-4
                                      dark:file:bg-neutral-700 dark:file:text-rose-700
                                      @else
                                      mt-4 block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                                      file:bg-gray-50 file:border-0
                                      file:me-4
                                      file:py-3 file:px-4
                                      dark:file:bg-neutral-700 dark:file:text-neutral-400 @endif
                                      ">
                                @error('bg_merchant')
                                    <p class="text-xs text-rose-700 dark:text-rose-700" id="hs-textarea-helper-text">
                                        {{ $message }}</p>
                                @enderror
                                <p class="mt-2 text-xs text-gray-500 dark:text-neutral-500"
                                    id="hs-textarea-helper-text">Pilih foto untuk cover merchant</p>
                                <hr>
                                <input type="file" name="fotos_produk[]" id="file-input"
                                    placeholder="pilih file logo"
                                    class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                                      file:bg-gray-50 file:border-0
                                      file:me-4
                                      file:py-3 file:px-4
                                      dark:file:bg-neutral-700 dark:file:text-neutral-400"
                                    multiple>
                                <p class="mt-2 text-xs text-gray-500 dark:text-neutral-500"
                                    id="hs-textarea-helper-text">Kamu bisa pilih lebih dari satu file untuk produk atau
                                    layananmu</p>
                                <button type="submit"
                                    class="inline-flex items-center justify-center w-full h-10 px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-neutral-950 hover:bg-neutral-900 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none">
                                    Masuk
                                </button>
                            </form>

                        </div>
                        <p class="mt-6 text-sm text-center text-neutral-500">Sudah punya akun? <a href="#_"
                                class="relative font-medium text-blue-600 group"><span>Login</span><span
                                    class="absolute bottom-0 left-0 w-0 group-hover:w-full ease-out duration-300 h-0.5 bg-blue-600"></span></a>
                        </p>
                    </div>
                </div>
                <div
                    class="relative top-0 bottom-0 right-0 flex-shrink-0 hidden w-1/3 overflow-hidden bg-cover lg:block">
                    <div class="absolute inset-0 z-20 w-full h-full opacity-70 bg-gradient-to-t from-black">
                    </div>
                    <img src="{{ asset('storage/images/static/login.png') }}"
                        class="z-10 object-cover w-full h-full" />
                </div>
            </div>

        </template>
    </div>
