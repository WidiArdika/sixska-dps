<x-layout>
    <div class="bg-yellow-100 w-full h-34 lg:h-44 lg:px-45 font-inter">
        <div class="bg-gradient-to-r from-white/0 from-0% via-white/100 to-white/0 to-100% h-1.5"></div>
        
        <div class="text-center py-7 lg:py-11 bg-gradient-to-r from-yellow-400/0 from-0% via-yellow-400/100 to-yellow-400/0 to-100%">
            <h1 class="font-black text-4xl lg:text-5xl text-yellow-950">Profil Sekolah</h1>
            <p class="text-lg font-medium text-yellow-950">SMK Negeri 6 Denpasar</p>
        </div>
        
        <div class="bg-gradient-to-r from-white/0 from-0% via-white/100 to-white/0 to-100% h-1.5"></div>
    </div>

    <div class="w-full lg:px-45 lg:py-12 py-8 lg:bg-stone-100 font-inter">
        <head>
            {{-- ✅ Tambahkan Three.js dan Panolens dari CDN --}}
            <script src="https://cdn.jsdelivr.net/npm/three@0.105.2/build/three.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/panolens@0.12.0/build/panolens.min.js"></script>
        </head>

        <div class="max-w-6xl mx-auto py-12 px-4 font-inter">
            <h1 class="text-3xl font-bold mb-8 text-center">Fasilitas Sekolah</h1>

            {{-- 🔘 Tab Buttons --}}
            <div class="flex flex-wrap justify-center gap-4 mb-8 border-b border-gray-300 pb-2">
                @foreach($fasilitas as $item)
                    <button 
                        class="tab-btn px-4 py-2 text-sm font-semibold rounded-lg border-b-2 transition-colors duration-200"
                        data-target="{{ $item->id }}"
                    >
                        {{ $item->nama }}
                    </button>
                @endforeach
            </div>

            {{-- 🌐 Viewer container tunggal --}}
            <div id="panolens-container" class="relative w-full h-[500px] z-10 rounded-xl shadow"></div>
        </div>
    </div>
    @include('partials.fasilitas-script')
</x-layout>