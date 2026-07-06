@extends('layouts.app')

@section('title','Daftar Kategori')

@section('content')

<h2 class="mb-4">Daftar Kategori Buku</h2>

<div class="row">

@foreach($kategori_list as $kategori)

<div class="col-md-4 mb-4">

<div class="card h-100 shadow">

<div class="card-body">

<h4>{{ $kategori['nama'] }}</h4>

<p>{{ $kategori['deskripsi'] }}</p>

<p>

<span class="badge bg-primary">

{{ $kategori['jumlah_buku'] }} Buku

</span>

</p>

<a href="{{ route('kategori.show',$kategori['id']) }}"
class="btn btn-success">

Detail

</a>

</div>

</div>

</div>

@endforeach

</div>

@endsection