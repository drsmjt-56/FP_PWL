@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-4">
  Selamat datang, {{ session('user_email') }}
</h1>

<p>Role: {{ session('user_type') }}</p>
@endsection
