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
            <?php $__currentLoopData = $laporanTanamanMasuk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td>
                    <img src="<?php echo e($item->plant->image ? asset('storage/' . $item->plant->image) : asset('default-image.png')); ?>" style="width: 60px; height: 60px;">
                </td>
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
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/exports/laporan_tanaman_masuk_pdf.blade.php ENDPATH**/ ?>