<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanTanamanMasukExport implements FromCollection, WithHeadings, WithMapping
{
    protected $data;

    // Tambahkan konstruktor untuk menerima data
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data; // Kembalikan data yang sudah difilter
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
