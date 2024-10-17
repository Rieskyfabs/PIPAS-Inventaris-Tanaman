<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Tanaman Keluar - Print</title>
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
        LAPORAN TANAMAN KELUAR
    </div>

    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>KODE TANAMAN KELUAR</th>
                <th>KODE TANAMAN</th>
                <th>NAMA TANAMAN</th>
                <th>KONDISI TANAMAN</th>
                <th>TANGGAL KELUAR</th>
                <th>JUMLAH KELUAR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporanTanamanKeluar as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
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
