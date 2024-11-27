<!DOCTYPE html>
<html>
<head>
    <title>Laporan Tanaman Masuk</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Laporan Tanaman Masuk</h1>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>GAMBAR</th>
                <th>KODE TANAMAN MASUK</th>
                <th>KODE TANAMAN</th>
                <th>NAMA TANAMAN</th>
                <th>KONDISI TANAMAN</th>
                <th>TANGGAL MASUK</th>
                <th>JUMLAH MASUK</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporanTanamanMasuk as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ $item->plant->image ? asset('storage/' . $item->plant->image) : asset('default-image.png') }}" style="width: 60px; height: 60px;">
                </td>
                <td>{{ $item->kode_tanaman_masuk }}</td>
                <td>{{ $item->plant->plantAttribute->plant_code }}</td>
                <td>{{ $item->plant->plantAttribute->name }}</td>
                <td>{{ ucfirst($item->plant->status) }}</td>
                <td>{{ $item->tanggal_masuk }}</td>
                <td>{{ $item->jumlah_masuk }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
