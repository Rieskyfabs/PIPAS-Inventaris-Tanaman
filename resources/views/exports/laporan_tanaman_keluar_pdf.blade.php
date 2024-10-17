<!DOCTYPE html>
<html>
<head>
    <title>Laporan Tanaman Keluar</title>
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
    <h1>Laporan Tanaman Keluar</h1>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>GAMBAR</th>
                <th>KODE TANAMAN KELUAR</th>
                <th>KODE TANAMAN</th>
                <th>NAMA TANAMAN</th>
                <th>KONDISI TANAMAN</th>
                <th>TANGGAL KELUAR</th>
                <th>JUMLAH KELUAR</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporanTanamanKeluar as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ $item->plant->image ? asset('storage/' . $item->plant->image) : asset('default-image.png') }}" style="width: 60px; height: 60px;">
                </td>
                <td>{{ $item->kode_tanaman_keluar }}</td>
                <td>{{ $item->plant->plantAttribute->plant_code }}</td>
                <td>{{ $item->plant->plantAttribute->name }}</td>
                <td>{{ ucfirst($item->plant->status) }}</td>
                <td>{{ $item->tanggal_keluar }}</td>
                <td>{{ $item->jumlah_keluar }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
