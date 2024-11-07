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
            <?php $__currentLoopData = $laporanTanamanMasuk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($item->kode_tanaman_masuk); ?></td>
                <td><?php echo e($item->plant->plantAttribute->plant_code); ?></td>
                <td><?php echo e($item->plant->plantAttribute->name); ?></td>
                <td><?php echo e(ucfirst($item->plant->status)); ?></td>
                <td><?php echo e($item->tanggal_masuk); ?></td>
                <td><?php echo e($item->jumlah_masuk); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</body>
</html>
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/reports/tanaman-masuk-print.blade.php ENDPATH**/ ?>