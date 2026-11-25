@extends('layouts.app')

@section('title', 'Tambah Biodata Anggota')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">
        <div class="card border rounded-3 shadow-none bg-white p-4">
            <h4 class="fw-bold mb-3 text-dark">Tambah Biodata Anggota</h4>
            <hr class="mb-4">

            @if ($errors->any())
                <div class="alert alert-danger py-2 small rounded-2">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold small">Nama Lengkap</label>
                    <input type="text" class="form-control rounded-2" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Contoh: andi agus salim" required>
                </div>

                <div class="mb-3">
                    <label for="nim" class="form-label fw-semibold small">NIM</label>
                    <input type="text" class="form-control rounded-2" id="nim" name="nim" value="{{ old('nim') }}" placeholder="Contoh: 12.11.6018" required>
                </div>

                <div class="mb-3">
                    <label for="peran" class="form-label fw-semibold small">Peran (Opsional)</label>
                    <input type="text" class="form-control rounded-2" id="peran" name="peran" value="{{ old('peran') }}" placeholder="Contoh: master / pegawai">
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-semibold small">Deskripsi Tugas</label>
                    <textarea class="form-control rounded-2" id="deskripsi" name="deskripsi" rows="3" placeholder="Contoh: dengan NIM 12.11.6018 merupakan pegawai dan mempunyai tugas mengerjakan back-end pada UTS ini">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="foto" class="form-label fw-semibold small">Foto Anggota</label>
                    <input type="file" class="form-control rounded-2" id="foto" name="foto" accept="image/*">
                    <div class="form-text small">Format gambar JPG, PNG, atau WEBP (Maksimal 2MB).</div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('biodata.index') }}" class="btn btn-outline-secondary px-3 rounded-2">Batal</a>
                    <button type="submit" class="btn btn-primary px-4 rounded-2">Simpan Biodata</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
