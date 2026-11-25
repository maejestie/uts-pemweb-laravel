@extends('layouts.app')

@section('title', 'UTS Pem Web - Biodata Anggota')

@section('content')
    <!-- Notifikasi Alert Sukses / Error Sesuai Referensi -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 d-flex justify-content-between align-items-center mb-4 rounded-2" style="background-color: #d1e7dd; color: #0f5132;" role="alert">
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Container Grid Kartu Biodata & Tombol Tambah (+) Sesuai Gambar Referensi -->
    <div class="row row-cols-1 row-cols-md-3 g-4 align-items-stretch">
        
        <!-- Kartu 1: Tombol Tambah Data (+) -->
        <div class="col">
            <div class="card h-100 border rounded-3 shadow-none bg-white d-flex align-items-center justify-content-center text-center p-4">
                <a href="{{ route('biodata.create') }}" class="text-decoration-none d-flex flex-column align-items-center justify-content-center w-100 h-100" style="min-height: 420px;">
                    <!-- Ikon Bulat Hijau Tambah (+) SVG -->
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 110px; height: 110px; background-color: #5cb85c;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="white" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </div>
                </a>
            </div>
        </div>

        <!-- Kartu-kartu Anggota -->
        @foreach($biodatas as $item)
            <div class="col">
                <div class="card h-100 border rounded-3 shadow-none bg-white overflow-hidden d-flex flex-column justify-content-between">
                    <div>
                        <!-- Foto Anggota -->
                        <div class="w-100 bg-light text-center" style="height: 280px; overflow: hidden;">
                            @if($item->foto && file_exists(public_path('images/' . $item->foto)))
                                <img src="{{ asset('images/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-100 h-100 object-fit-cover">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-secondary-subtle text-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Info Teks Anggota Sesuai Gambar Referensi -->
                        <div class="p-3">
                            <h5 class="fw-bold text-dark mb-1">{{ $item->nama }}</h5>
                            <p class="text-secondary small mb-0 lh-sm">
                                @if($item->deskripsi)
                                    {{ $item->deskripsi }}
                                @else
                                    {{ $item->nim }} merupakan {{ $item->peran ?? 'anggota' }} dari uts ini.
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Tombol Aksi Edit & Hapus (Sesuai Tombol Berbingkai di Gambar Referensi) -->
                    <div class="p-3 pt-0 d-flex gap-2">
                        <a href="{{ route('biodata.edit', $item->id) }}" class="btn btn-outline-primary btn-sm px-3 rounded-2">Edit</a>
                        
                        <form action="{{ route('biodata.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus biodata ini?');" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm px-3 rounded-2">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
