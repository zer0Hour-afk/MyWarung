<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container">
        <h1 class="mb-4 text-center">Daftar Barang</h1>
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th> 
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barang as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->nama_barang }}</td>
                    <td>Rp {{ number_format($b->harga_beli, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($b->harga_jual, 0, ',', '.') }}</td>
                    <td>{{ $b->stok }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="/pemasok" class="btn btn-primary mt-3">📋 Lihat Data Pemasok</a>
    </div>
</body>
</html>
