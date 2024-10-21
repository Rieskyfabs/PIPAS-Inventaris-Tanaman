<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Tanaman Masuk - Print</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .table-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="table-title">
        LAPORAN TANAMAN MASUK
    </div>

    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>KODE TANAMAN MASUK</th>
                <th>KODE TANAMAN</th>
                <th>NAMA TANAMAN</th>
                <th>KONDISI TANAMAN</th>
                <th>TANGGAL MASUK</th>
                <th>JUMLAH MASUK</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporanTanamanMasuk as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
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
