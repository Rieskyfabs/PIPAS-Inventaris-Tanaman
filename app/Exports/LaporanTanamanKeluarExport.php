<?php

namespace App\Exports;

use App\Models\TanamanKeluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanTanamanKeluarExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return TanamanKeluar::with('plant.plantAttribute')->get();
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item->plant->image ? asset('storage/' . $item->plant->image) : asset('default-image.png'),
            $item->kode_tanaman_keluar,
            $item->plant->plantAttribute->plant_code,
            $item->plant->plantAttribute->name,
            ucfirst($item->plant->status),
            $item->tanggal_keluar,
            $item->jumlah_keluar,
        ];
    }

    public function headings(): array
    {
        return [
            'NO',
            'GAMBAR',
            'KODE TANAMAN KELUAR',
            'KODE TANAMAN',
            'NAMA TANAMAN',
            'KONDISI TANAMAN',
            'TANGGAL KELUAR',
            'JUMLAH KELUAR',
        ];
    }
}
