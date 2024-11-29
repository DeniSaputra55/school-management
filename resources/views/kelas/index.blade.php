@extends('layout')

@section('title', 'Manage Kelas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
<h1>Data Kelas</h1>
    <a href="/kelas/create" class="btn btn-dark">Tambah Siswa</a>
</div>
<a href="{{ route('home') }}" class="text-primary">Kembali ke Home</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($classes as $kelas)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kelas->nama }}</td>
            <td>
                <a href="/kelas/{{ $kelas->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                <form action="/kelas/{{ $kelas->id }}" method="POST" class="d-inline">
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