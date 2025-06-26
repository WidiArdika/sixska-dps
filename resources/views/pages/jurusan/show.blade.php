<x-layout>
    <div class="max-w-3xl mx-auto py-10">
        <img src="{{ asset('storage/' . $jurusan->gambar) }}" class="rounded-xl mb-6 aspect-3/2 w-full object-cover" />
        <h1 class="text-3xl font-bold text-yellow-800 mb-4">{{ $jurusan->nama }}</h1>
        <div class="prose max-w-none">
            {!! $jurusan->deskripsi !!}
        </div>
    </div>
</x-layout>