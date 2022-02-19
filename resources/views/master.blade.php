<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Wahyu Ramadhani">
    <title>CRUD Laravel - synodev.my.id</title>
    <link rel="icon" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <main class="container pt-5">
        <div class="bg-light p-3 rounded">
            <h1>CRUD Laravel</h1>
            <div class="navbar">
                <p class="me-auto navbar-brand">Tabel Perpustakaan</p>
                <div class="d-flex">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Data</button>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('successDelete'))
                <div class="alert alert-danger">
                    {{ session('successDelete') }}
                </div>
            @endif

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Buku</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                @php
                    $no = '1';
                @endphp
                @foreach ($perpus as $row)
                <tbody>
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->buku }}</td>
                        <td>{{ $row->pengarang }}</td>
                        <td>{{ $row->tahun_terbit }}</td>
                        <td>
                            <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-{{ $row->id }}"><i class="fa fa-solid fa-pencil"></i></a>
                            <a href="/hapus-buku/{{ $row->id }}" class="btn btn-danger"><i class="fa fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </main>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('add.store') }}" method="post">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="mb-2">
                            <label for="judul-buku" class="col-form-label">Judul Buku:</label>
                            <input type="text" class="form-control" name="buku" required>
                        </div>
                        <div class="mb-2">
                            <label for="pengarang" class="col-form-label">Pengarang:</label>
                            <input type="text" class="form-control" name="pengarang" required>
                        </div>
                        <div class="mb-2">
                            <label for="tahun-terbit" class="col-form-label">Tahun Terbit:</label>
                            <input type="number" class="form-control" name="tahun_terbit" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Data -->
    @foreach ($perpus as $row)
    <div class="modal fade" id="editModal-{{ $row->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/edit/'. $row->id) }}" method="post" >
                    <div class="modal-body">
                        {{ csrf_field() }}

                        <div class="mb-2">
                            <label for="judul-buku" class="col-form-label">Judul Buku:</label>
                            <input type="text" class="form-control" name="buku" value="{{ $row->buku }}" required>
                        </div>
                        <div class="mb-2">
                            <label for="pengarang" class="col-form-label">Pengarang:</label>
                            <input type="text" class="form-control" name="pengarang" value="{{ $row->pengarang }}" required>
                        </div>
                        <div class="mb-2">
                            <label for="tahun-terbit" class="col-form-label">Tahun Terbit:</label>
                            <input type="number" class="form-control" name="tahun_terbit" value="{{ $row->tahun_terbit }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</body>
</html>