@extends('layout')

@section('title', 'Manage Guru')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Data Guru</h1>
    <a href="/guru/create" class="btn btn-dark">Tambah Guru</a>
</div>
<a href="{{ route('home') }}" class="text-primary">Kembali ke Home</a>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($teachers as $guru)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $guru->nama }}</td>
            <td>
                @if ($guru->kelas)
                {{ $guru->kelas->nama }}
                @else
                <span class="text-muted">Kelas tidak ditemukan</span>
                @endif
            </td>
            <td>
                <a href="/guru/{{ $guru->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                <form action="/guru/{{ $guru->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
