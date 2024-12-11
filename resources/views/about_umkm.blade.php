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
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js">
        < script >
            window.addEventListener('load', () => {
                (function() {
                    const range = document.querySelector('#hs-pass-value-to-html-element');
                    const rangeInstance = new HSRangeSlider(range);
                    const target = document.querySelector('#hs-pass-value-to-html-element-target');

                    range.noUiSlider.on('update', (values) => target.innerText = rangeInstance.formattedValue);
                })();
            }); <
        />
    </script>
    <link href="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/css/pagedone.css " rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/js/pagedone.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify/dist/simple-notify.css" />


    <script src="https://cdn.jsdelivr.net/npm/simple-notify/dist/simple-notify.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="flex flex-col justify-center items-center mb-24">
    <x-navbar></x-navbar>
    <div x-data="{ rating: 3, comments: '', images: [@foreach (App\Models\FotoProduct::where('merchant_id', $merchant->id)->get() as $item)'{{ asset('storage/images/product/' . $item->foto) }}', @endforeach], activeIndex: 0 }" class="max-w-7xl mx-auto px-4 py-8">

        <!-- Carousel for Products -->
        <div class="relative overflow-hidden rounded-lg shadow-lg">
            <div class="relative flex transition-transform duration-500 ease-in-out"
                :style="{ transform: 'translateX(' + (-activeIndex * 100) + '%)' }">
                <template x-for="(image, index) in images" :key="index">
                    <div x-show="activeIndex === index" class="carousel-item w-full flex-none">
                        <img class="w-full h-full object-cover rounded-t-lg" :src="image"
                            :alt="'Product ' + (index + 1)">
                    </div>
                </template>
            </div>
            <!-- Carousel Controls -->
            <button @click="activeIndex = activeIndex > 0 ? activeIndex - 1 : images.length - 1"
                class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-gray-900 text-white p-2 rounded-full focus:outline-none">
                <span class="carousel-control-prev-icon block h-6 w-6 bg-no-repeat bg-center bg-white rounded-full"
                    aria-hidden="true"></span>
            </button>
            <button @click="activeIndex = activeIndex < images.length - 1 ? activeIndex + 1 : 0"
                class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-gray-900 text-white p-2 rounded-full focus:outline-none">
                <span class="carousel-control-next-icon block h-6 w-6 bg-no-repeat bg-center bg-white rounded-full"
                    aria-hidden="true"></span>
            </button>
        </div>

        <!-- Product Details -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-3xl font-bold mb-2">{{ $merchant->name }}</h2>
            <p class="text-gray-700 mb-4">{{ $merchant->desc }}</p>



            <!-- Services Provided -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Layanan</h3>
                <ul class="list-disc pl-5 space-y-1 text-gray-700">
                    @foreach (App\Models\Layanan::where('merchant_id', $merchant->id)->get() as $item)
                        <li>{{ $item->name }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Comments Section -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Comments</h3>
                <div class="comments-list">
                    @foreach (App\Models\Komen::where('merchant_id', $merchant->id)->get() as $komen)
                        <div class="comment bg-white p-4 rounded-lg shadow-md mb-2">
                            <p class="text-gray-700">{{ $komen->komentar }}</p>
                        </div>
                    @endforeach

                </div>
                <!-- Add Comment Form -->
                <form class="mt-4" action="{{ route('add.komentar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="merchant" value="{{ $merchant->id }}">
                    <textarea rows="3" class="w-full p-2 border border-gray-300 rounded-lg mb-2" placeholder="Add a comment..."
                        @if (!auth()->check()) disabled @endif name="komentar"></textarea>
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        @if (!auth()->check()) disabled @endif>Add
                        Comment</button>
                </form>
            </div>
        </div>

    </div>




    <script>
        @if (session("alert"))

        new Notify({
            status: 'success',
            title: 'Notify Title',
            text: '{{session()->get('alert')}}',
            effect: 'fade',
            speed: 300,
            customClass: '',
            customIcon: '',
            showIcon: true,
            showCloseButton: true,
            autoclose: true,
            autotimeout: 3000,
            notificationsGap: null,
            notificationsPadding: null,
            type: 'outline',
            position: 'right top',
            customWrapper: '',
        })
        @endif

    </script>


</body>

</html>
