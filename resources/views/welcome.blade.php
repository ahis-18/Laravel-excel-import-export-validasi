<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

    <div class="px-4 mt-3 mb-3 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('images/laravel.png') }}" alt="" width="72">
        <h1 class="display-5 fw-bold">Laravel Excel</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Belajar import export excel di laravel</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-success btn-lg px-4 gap-3" data-bs-toggle="modal"
                    data-bs-target="#importModal">Import</button>
                <a href="{{ route('barang.export') }}" class="btn btn-outline-success btn-lg px-4">Export</a>
            </div>
        </div>
    </div>

    {{-- Data Barang --}}
    <div class="col-lg-6 mx-auto">
        {{-- Pesan Sukses --}}

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        @if (session()->has('failures'))
            <table class="table table-warning">
                <tr>
                    <th>Baris</th>
                    <th>Attribute</th>
                    <th>Error</th>
                    <th>Value</th>
                </tr>

                @foreach (session()->get('failures') as $validasi)
                    <tr>
                        <td>{{ $validasi->row() }}</td>
                        <td>{{ $validasi->attribute() }}</td>
                        <td>
                            <ul>
                                @foreach ($validasi->errors() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $validasi->values()[$validasi->attribute()] }}</td>
                    </tr>
                @endforeach
            </table>

        @endif

        <div class="bg-white shadow p-4">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Merk</th>
                            <th>Kode</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->stok }}</td>
                                <td>{{ $item->merk }}</td>
                                <td>{{ $item->kode }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal Import-->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('barang.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Pilih File</label>
                            <input type="file" class="form-control" name="file">
                        </div>
                        <button class="btn btn-success" type="submit">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
