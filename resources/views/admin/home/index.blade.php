@extends('admin.layouts.app')

@section('content')
<h2 class="mb-4">Manajemen Home</h2>

{{-- ALERT SUCCESS --}}
@if(session('success'))
    <div class="alert alert-success">
        ✅ {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('admin.home.update') }}">
    @csrf

    <!-- CARD JUDUL & DESKRIPSI -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-3">Judul & Deskripsi</h5>

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control"
                       value="{{ $home->judul }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ $home->deskripsi }}</textarea>
            </div>
        </div>
    </div>

    <!-- CARD STATUS -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-3">Status Home</h5>

            <select name="status" class="form-select">
                <option value="aktif" {{ $home->status == 'aktif' ? 'selected' : '' }}>
                    Aktif
                </option>
                <option value="nonaktif" {{ $home->status == 'nonaktif' ? 'selected' : '' }}>
                    Nonaktif
                </option>
            </select>
        </div>
    </div>

    <!-- CARD PRODUK UNGGULAN -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-3">Produk Unggulan</h5>

            @foreach($products as $product)
                <div class="form-check mb-2">
                    <input class="form-check-input"
                           type="checkbox"
                           name="produk_unggulan[]"
                           value="{{ $product->id }}"
                           {{ $product->is_featured ? 'checked' : '' }}>

                    <label class="form-check-label">
                        {{ $product->nama_produk }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <!-- BUTTON -->
    <button class="btn btn-primary px-4">Simpan</button>
</form>
@endsection
