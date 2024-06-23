<x-app-layout>
    <div class="theme-page">
        <div class="row gray full-width page-header vertical-align-table">
            <div class="row full-width padding-top-bottom-50 vertical-align-cell">
                <div class="row">
                    <div class="page-header-left">
                        <h1>{{$car->vehicle_brand}} {{ $car->vehicle_model }}</h1>
                    </div>
                    <div class="page-header-right">
                        <div class="bread-crumb-container">
                            <ul class="bread-crumb">
                                <li>
                                    <a title="Home" href="/">
                                        HOME
                                    </a>
                                </li>
                                <li class="separator">
                                    &#47;
                                </li>
                                <li>
                                    AUTOS
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="container mx-auto">
                            <div class="grid gap-6 grid-cols-1 lg:grid-cols-5">
                                <div class="lg:col-span-3">
                                    <div
                                        x-data="{
                      images: ['{{$car->vehicle_image}}'],
                      activeImage: null,
                      prev() {
                          let index = this.images.indexOf(this.activeImage);
                          if (index === 0)
                              index = this.images.length;
                          this.activeImage = this.images[index - 1];
                      },
                      next() {
                          let index = this.images.indexOf(this.activeImage);
                          if (index === this.images.length - 1)
                              index = -1;
                          this.activeImage = this.images[index + 1];
                      },
                      init() {
                          this.activeImage = this.images.length > 0 ? this.images[0] : null
                      }
                    }"
                                    >
                                        <div class="relative">
                                            <template x-for="image in images">
                                                <div
                                                    x-show="activeImage === image"
                                                    class="aspect-w-3 aspect-h-2"
                                                >
                                                    <img :src="image" alt="" class="w-auto mx-auto"/>
                                                </div>
                                            </template>
                                            <a
                                                @click.prevent="prev"
                                                class="cursor-pointer bg-black/30 text-white absolute left-0 top-1/2 -translate-y-1/2"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-10 w-10"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M15 19l-7-7 7-7"
                                                    />
                                                </svg>
                                            </a>
                                            <a
                                                @click.prevent="next"
                                                class="cursor-pointer bg-black/30 text-white absolute right-0 top-1/2 -translate-y-1/2"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-10 w-10"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M9 5l7 7-7 7"
                                                    />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="flex">
                                            <template x-for="image in images">
                                                <a
                                                    @click.prevent="activeImage = image"
                                                    class="cursor-pointer w-[80px] h-[80px] border border-gray-300 hover:border-purple-500 flex items-center justify-center"
                                                    :class="{'border-purple-600': activeImage === image}"
                                                >
                                                    <img :src="image" alt="" class="w-auto max-auto max-h-full"/>
                                                </a>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                                <div class="lg:col-span-2 m-3 p-3 text-start">
                                    <h1 class="text-lg"><b>Brand</b>: {{ $car->vehicle_brand }}</h1>
                                    <h1 class="text-lg"><b>Model</b>: {{ $car->vehicle_model }}</h1>
                                    <h1 class="text-lg"><b>Transmission</b>: {{ $car->vehicle_transmission }}</h1>
                                    <h1 class="text-lg"><b>Mileage</b>: {{ $car->vehicle_mileage }}</h1>
                                    <h1 class="text-lg"><b>Year built</b>: {{ $car->vehicle_year }}</h1>
                                    <h1 class="text-lg"><b>Description</b>: {{ $car->vehicle_description }}</h1>
                                    <h1 class="text-lg"><b>Price</b>: {{$car->vehicle_price}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


