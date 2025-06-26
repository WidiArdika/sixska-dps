<x-layout>
    <div class="bg-yellow-100 w-full h-34 lg:h-44 lg:px-45 font-inter">
        <div class="bg-gradient-to-r from-white/0 from-0% via-white/100 to-white/0 to-100% h-1.5"></div>
        
        <div class="text-center py-7 lg:py-11 bg-gradient-to-r from-yellow-400/0 from-0% via-yellow-400/100 to-yellow-400/0 to-100%">
            <h1 class="font-black text-4xl lg:text-5xl text-yellow-950">Berita dan Kegiatan</h1>
            <p class="text-lg font-medium text-yellow-950">SMK Negeri 6 Denpasar</p>
        </div>
        
        <div class="bg-gradient-to-r from-white/0 from-0% via-white/100 to-white/0 to-100% h-1.5"></div>
    </div>

    <div class="hidden md:block w-full lg:px-45 lg:pt-12 py-8 px-4 md:px-8 font-inter">
        <h1 class="hidden md:block mb-7 text-3xl font-bold text-stone-900">Daftar Berita dan Kegiatan Terkini</h1>
        <div class="grid grid-cols-3 gap-4">
                <x-berita-card :berita="$beritaPertama" :lineClamp="5" :textSize="'4xl'" class="col-span-2" />
                <x-berita-card :berita="$beritaKedua" :lineClamp="18" :textSize="'2xl'" />
        </div>
    </div>

    <div class="w-full lg:px-45 lg:pb-12 py-8 px-4 md:px-8 font-inter">
        <h1 class="hidden md:block mb-7 text-3xl font-bold text-stone-900">Daftar Berita dan Kegiatan</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($berita as $berita)
                <x-berita-card :berita="$berita" :lineClamp="10" />
            @endforeach
        </div>
    </div>
</x-layout>