<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">SchoolApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/siswa">Siswa</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kelas">Kelas</a></li>
                    <li class="nav-item"><a class="nav-link" href="/guru">Guru</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
        @extends('layout')

        @section('title', 'Home')

        @section('content')
        <h1 class="mb-4">Dashboard</h1>

        @foreach ($kelas as $kls)
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5>Kelas: {{ $kls->nama }}</h5>
            </div>
            <div class="card-body">
                <!-- Tabel Siswa -->
                <h6>Daftar Siswa</h6>
                @if ($kls->students->isEmpty())
                <p class="text-muted">Tidak ada siswa di kelas ini.</p>
                @else
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kls->students as $index => $siswa)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>
                                @if ($siswa->kelas)
                                {{ $siswa->kelas->nama }}
                                @else
                                <span class="text-muted">Kelas tidak ditemukan</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

                <!-- Tabel Guru -->
                <h6 class="mt-4">Daftar Guru</h6>
                @if ($kls->teachers->isEmpty())
                <p class="text-muted">Tidak ada guru di kelas ini.</p>
                @else
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kls->teachers as $index => $guru)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $guru->nama }}</td>
                            <td>
                                @if ($guru->kelas)
                                {{ $guru->kelas->nama }}
                                @else
                                <span class="text-muted">Kelas tidak ditemukan</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
        <!-- Bagian Daftar Kelas -->
        <!-- <div class="card mb-4 shadow-sm">
            <div class="card-header bg-info text-white">
                <h5>Daftar Kelas</h5>
            </div>
            <div class="card-body">
                @if ($kelas->isEmpty())
                <p class="text-muted">Tidak ada kelas yang tersedia.</p>
                @else
                <ul class="list-group">
                    @foreach ($kelas as $kls)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $kls->nama }}
                        <span class="badge bg-primary rounded-pill">
                            {{ $kls->students->count() }} Siswa
                        </span>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div> -->
        @endforeach
        @endsection

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>