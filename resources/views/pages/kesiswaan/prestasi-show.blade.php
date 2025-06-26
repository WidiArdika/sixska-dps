<x-layout>
    <div class="max-w-3xl mx-auto py-10 space-y-6">
        <img src="{{ $prestasi->gambar 
            ? asset('storage/' . $prestasi->gambar) 
            : asset('images/fallback.jpg') }}" 
            alt="{{ $prestasi->judul }}"
            class="aspect-3/2 w-full rounded-xl object-cover">
        <h1 class="text-3xl font-bold text-yellow-500 font-inter">{{ $prestasi->judul }}</h1>
        <div class="flex flex-wrap items-center gap-1">
            <div class="px-4 py-1 text-xs bg-yellow-500 text-white font-bold w-fit rounded-full font-inter">
                {{ \Carbon\Carbon::parse($prestasi->tanggal)->translatedFormat('l, d F Y') }}
            </div>
            <div class="px-4 py-1 text-xs bg-stone-900 text-white font-bold w-fit rounded-full whitespace-nowrap font-inter">
                Prestasi
            </div>
        </div>
        <div class="text-stone-600 content-style font-inter">
            {!! $prestasi->deskripsi !!}
        </div>
        <p class="text-xs text-stone-400 mt-4 font-inter">Diterbitkan {{ $prestasi->created_at->diffForHumans() }}</p>
    </div>
</x-layout>
