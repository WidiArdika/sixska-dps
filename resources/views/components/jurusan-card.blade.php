<div class="overflow-hidden rounded-xl bg-white shadow-md">
    <img alt="" src="{{ $gambar }}" class="aspect-3/2 w-full object-cover"/>
    <div class="px-6 pt-6">
        <h3 class="text-2xl font-bold text-stone-950 leading-none font-inter">
            {{ $judul }}
        </h3>
    </div>
    <div class="px-6 py-4">
        <div class="line-clamp-4 text-sm/relaxed text-stone-600 font-inter">
            {!! $deskripsi !!}
        </div>
    </div>
    <div class="px-6 pb-4">
        <a class="text-sm py-3 bg-yellow-100 rounded-xl font-inter flex items-center justify-center text-yellow-500 font-bold hover:bg-yellow-300 hover:text-yellow-900" 
        href="{{ route('jurusan.show', $jurusan) }}">
            Selengkapnya ->
        </a>
    </div>
</div>
