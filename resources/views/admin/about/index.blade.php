<!DOCTYPE html>
<html>
<head>
    <title>Kelola About Us</title>
</head>
<body>

<h2>Kelola About Us</h2>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form action="/admin/about/{{ $about->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Judul</label><br>
    <input type="text" name="judul" value="{{ $about->judul }}"><br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi">{{ $about->deskripsi }}</textarea><br><br>

    <label>Visi</label><br>
    <input type="text" name="visi" value="{{ $about->visi }}"><br><br>

    <label>Misi</label><br>
    <input type="text" name="misi" value="{{ $about->misi }}"><br><br>

    <label>Foto About Us</label><br>
    <input type="file" name="gambar"><br><br>

    @if($about->gambar)
        <img src="{{ asset('storage/about/'.$about->gambar) }}" width="200"><br><br>
    @endif

    <button type="submit">Simpan</button>
</form>

</body>
</html>
