<section class="w-full px-8 text-gray-700 bg-white" {!! $attributes ?? '' !!}>
    <div class="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
        <div class="relative flex flex-col md:flex-row">
            <a href="#_"
                class="flex items-center mb-5 font-medium text-gray-900 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                <a href="{{ route('merchant.index') }}"
                    class="relative z-10 flex items-center w-auto text-2xl font-extrabold leading-none text-black select-none">santay.</a>
            </a>
            <nav
                class="flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200">
                <a href="{{ route('merchant.index') }}"
                    class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900 {{ activeNav(route('merchant.index'), 'text-gray-900') }}">Home</a>
                <a href="{{ route('merchant.rank') }}"
                    class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900 {{ activeNav(route('merchant.rank'), 'text-gray-900') }}">Rank</a>
                <a href="{{ route('merchant.discover') }}"
                    class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900 {{ activeNav(route('merchant.discover'), 'text-gray-900') }}">Discover</a>
                @if (auth()->check())
                    <a href="{{ route('logout.user') }}"
                        class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900 {{ activeNav(route('merchant.discover'), 'text-gray-900') }}">Log
                        out</a>
                @endif

            </nav>
        </div>
        @if (auth()->check())
            <div class="flex flex-row">
                <svg class="" width="26px" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M493.7 .9L299.4 75.6l2.3-29.3c1-12.8-12.8-21.5-24-15.1L101.3 133.4C38.6 169.7 0 236.6 0 309C0 421.1 90.9 512 203 512c72.4 0 139.4-38.6 175.7-101.3L480.8 234.3c6.5-11.1-2.2-25-15.1-24l-29.3 2.3L511.1 18.3c.6-1.5 .9-3.2 .9-4.8C512 6 506 0 498.5 0c-1.7 0-3.3 .3-4.8 .9zM192 192a128 128 0 1 1 0 256 128 128 0 1 1 0-256zm0 96a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm16 96a16 16 0 1 0 0-32 16 16 0 1 0 0 32z" />
                </svg>
                <p class="ml-2">{{auth()->user()->elixir}}</p>
                <div class="inline-block h-[20px] min-h-[1em] w-0.5 self-stretch bg-neutral-200 dark:bg-white/10 ml-2 mr-4">
                </div>
                <h2 class="font-bold">{{ auth()->user()->name }}</h2>

            </div>
        @else
            {{-- Sign in --}}
            <x-sign-in></x-sign-in>
            {{-- sign up --}}
            <x-sign-up></x-sign-up>
        @endif
</section>
