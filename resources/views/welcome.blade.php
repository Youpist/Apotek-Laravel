@extends('layout.app')

@section('title', 'Apotek Depok Jaya')

@section('content')

<main class="mt-12 grid gap-12 lg:grid-cols-[1.2fr_0.8fr] lg:items-center">

    <div class="space-y-8">

        <span
            class="inline-flex items-center rounded-full bg-red-100 px-4 py-1 text-sm font-semibold text-red-700">

            Solusi Apotek Terpercaya
        </span>

        <div class="space-y-4">

            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                Apotek Depok Jaya
            </h1>

            <p class="max-w-2xl text-lg leading-8 text-gray-600">
                Melayani keluarga dengan obat resep,
                vitamin, dan produk kesehatan lengkap.
            </p>
        </div>

        <div class="grid gap-4 sm:flex sm:items-center">

            <a href="#produk"
                class="inline-flex items-center justify-center rounded-full bg-red-600 px-7 py-3 text-sm font-semibold text-white hover:bg-red-700">

                Lihat Produk
            </a>
        </div>
    </div>

    <div
        class="relative overflow-hidden rounded-[2rem] bg-white p-4 shadow-2xl ring-1 ring-gray-200">

        <img src="https://images.unsplash.com/photo-1580281657521-3cda97040d66?auto=format&fit=crop&w=1080&q=80"
            class="h-full min-h-[28rem] w-full object-cover">
    </div>

</main>

@endsection