@extends('layouts.app')

@section('title',$kategori['nama'])

@section('content')

<nav aria-label="breadcrumb">

<ol class="breadcrumb">

<li class="breadcrumb-item">

<a href="{{ route('kategori.index') }}">
Kategori
</a>

</li>

<li class="breadcrumb-item active">

{{ $kategori['nama'] }}

</li>

</ol>

</nav>

<div class="card mb-4">

<div class="card-header bg-primary text-white">

<h3>{{ $kategori['nama'] }}</h3>

</div>

<div class="card-body">

<p>{{ $kategori['deskripsi'] }}</p>

<p>

Jumlah Buku

<span class="badge bg-success">

{{ $kategori['jumlah_buku'] }}

</span>

</p>

</div>

</div>

<h4>Daftar Buku</h4>

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>No</th>

<th>Judul</th>

<th>Pengarang</th>

</tr>

</thead>

<tbody>

@foreach($buku_list as $buku)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $buku['judul'] }}</td>

<td>{{ $buku['pengarang'] }}</td>

</tr>

@endforeach

</tbody>

</table>

@endsection