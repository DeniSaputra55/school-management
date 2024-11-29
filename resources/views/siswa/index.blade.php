@extends('layout')

@section('title', 'Manage Siswa')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Data Siswa</h1>
    <a href="/siswa/create" class="btn btn-dark">Tambah Siswa</a>
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
        @foreach ($students as $student)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->nama }}</td>
            <td>
                @if ($student->kelas)
                {{ $student->kelas->nama }}
                @else
                <span class="text-muted">Kelas tidak ditemukan</span>
                @endif
            </td>
            <td>
                <a href="/siswa/{{ $student->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                <form action="/siswa/{{ $student->id }}" method="POST" class="d-inline">
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