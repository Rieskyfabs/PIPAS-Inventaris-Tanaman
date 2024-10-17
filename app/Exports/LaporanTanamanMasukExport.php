<?php

namespace App\Exports;

use App\Models\TanamanMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanTanamanMasukExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return TanamanMasuk::with('plant.plantAttribute')->get();
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item->plant->image ? asset('storage/' . $item->plant->image) : asset('default-image.png'),
            $item->kode_tanaman_masuk,
            $item->plant->plantAttribute->plant_code,
            $item->plant->plantAttribute->name,
            ucfirst($item->plant->status),
            $item->tanggal_masuk,
            $item->jumlah_masuk,
        ];
    }

    public function headings(): array
    {
        return [
            'NO',
            'GAMBAR',
            'KODE TANAMAN MASUK',
            'KODE TANAMAN',
            'NAMA TANAMAN',
            'KONDISI TANAMAN',
            'TANGGAL MASUK',
            'JUMLAH MASUK',
        ];
    }
}
