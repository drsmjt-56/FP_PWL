@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-4">
  Selamat datang, {{ Auth::user()->name }} !
</h1>

<p class="text-sm text-gray-600 mb-6">
  Role: <span class="font-semibold">{{ Auth::user()->email }}</span>
</p>

<!-- GRAFIK -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

  <!-- STOK PRODUK -->
  <div class="bg-white rounded-xl border border-gray-200 p-6">
    <h3 class="text-base font-semibold text-slate-700 mb-4">
      Stok Produk
    </h3>
    <div class="h-72">
      <canvas id="stokChart"></canvas>
    </div>
  </div>

  <!-- STATUS PRODUK -->
  <div class="bg-white rounded-xl border border-gray-200 p-6">
    <h3 class="text-base font-semibold text-slate-700 mb-4">
      Status Produk
    </h3>
    <div class="h-72 flex items-center justify-center">
      <canvas id="statusChart"></canvas>
    </div>
  </div>

</div>

<script>
fetch('/dashboard/chart-data')
  .then(res => res.json())
  .then(data => {

    const barColors = data.stok.map(stok => {
      if (stok === 0) return '#7f1d1d';      // merah gelap
      if (stok <= 5) return '#1e40af';       // biru gelap
      return '#16a34a';                      // hijau (tetap)
    });

    new Chart(document.getElementById('stokChart'), {
      type: 'bar',
      data: {
        labels: data.labels,
        datasets: [{
          data: data.stok,
          backgroundColor: barColors,
          borderRadius: 8
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false }
        },
        scales: {
          y: {
            ticks: { color: '#475569' },
            grid: { color: '#e5e7eb' }
          },
          x: {
            ticks: { color: '#475569' }
          }
        }
      }
    });

    new Chart(document.getElementById('statusChart'), {
      type: 'doughnut',
      data: {
        labels: ['Tersedia', 'Stok Habis'],
        datasets: [{
          data: [data.tersedia, data.habis],
          backgroundColor: [
            '#16a34a', // hijau (tetap)
            '#7f1d1d'  // merah gelap
          ],
          borderWidth: 0,
          hoverOffset: 8
        }]
      },
      options: {
        cutout: '70%',
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              color: '#334155'
            }
          }
        }
      }
    });

  });
</script>


<!-- ATAS -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
  <div class="bg-white p-5 rounded-xl shadow">
    <p class="text-gray-500 text-sm">Total Produk</p>
    <p class="text-3xl font-bold text-gray-800">{{ $totalProduk }}</p>
  </div>

  <div class="bg-white p-5 rounded-xl shadow">
    <p class="text-gray-500 text-sm">Pesan Masuk</p>
    <p class="text-3xl font-bold text-gray-800">{{ $pesanMasuk }}</p>
  </div>

  <div class="bg-white p-5 rounded-xl shadow">
    <p class="text-gray-500 text-sm">Stok Habis</p>
    <p class="text-3xl font-bold text-red-500">{{ $stokHabis }}</p>
  </div>

  <div class="bg-white p-5 rounded-xl shadow">
    <p class="text-gray-500 text-sm">Produk Tersedia</p>
    <p class="text-3xl font-bold text-green-600">{{ $produkTersedia }}</p>
  </div>
</div>



<!-- BAWAH -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

  <!-- STOK MENIPIS -->
  <div class="bg-white rounded-xl shadow p-6">
    <h3 class="text-lg font-semibold mb-4">Produk Stok Menipis</h3>

    <table class="w-full text-sm">
      <tbody>
        @forelse($stokMenipis as $item)
          <tr class="border-b">
            <td class="py-2">{{ $item->nama_produk }}</td>
            <td class="py-2 text-right font-semibold">{{ $item->stok }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="2" class="py-4 text-center text-gray-400 italic">
              Tidak ada stok menipis
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- PESAN TERBARU -->
  <div class="bg-white rounded-xl shadow p-6">
    <h3 class="text-lg font-semibold mb-4">Pesan Terbaru</h3>

    <ul class="space-y-3 text-sm text-gray-700">
      @forelse($pesanTerbaru as $pesan)
        <li>
          • {{ $pesan->nama }}:
          <span class="italic text-gray-500">
            "{{ $pesan->pesan }}"
          </span>
        </li>
      @empty
        <li class="text-gray-400 italic">
          Belum ada pesan
        </li>
      @endforelse
    </ul>
  </div>
</div>

<!-- ACTION BUTTON -->
<div class="mt-6 mb-8 flex gap-8">
  <a href="{{ route('produk.create') }}"
     class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
    + Tambah Produk
  </a>

  <a href="{{ route('kontak.index') }}"
     class="px-5 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
    Lihat Pesan
  </a>
</div>




@endsection
