@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5>Edit Siswa</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('siswa.update', $siswa->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Nama Siswa -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ $siswa->nama }}" required>
                            </div>

                            <!-- Kelas Siswa (Select Option) -->
                            <div class="mb-3">
                                <label for="kelas_id" class="form-label">Kelas</label>
                                <select name="kelas_id" id="kelas_id" class="form-control" required>
                                    @foreach ($kelas as $kls)
                                        <option value="{{ $kls->id }}" 
                                            {{ $kls->id == $siswa->kelas_id ? 'selected' : '' }}>
                                            {{ $kls->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
