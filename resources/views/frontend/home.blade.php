<h1>{{ $home->judul }}</h1>
<p>{{ $home->deskripsi }}</p>

<h2>Produk Unggulan</h2>
@foreach($produkUnggulan as $p)
    <div>{{ $p->nama_produk }}</div>
@endforeach

<h2>Cara Sewa</h2>
@foreach($caraSewa as $c)
    <p>{{ $c->langkah }}. {{ $c->judul }}</p>
@endforeach
