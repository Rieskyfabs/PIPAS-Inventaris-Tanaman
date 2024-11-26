<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rombel;

class RombelSeeder extends Seeder
{
    public function run()
    {
        $rombels = [
            'PPLG XII - 1',
            'PPLG XII - 2',
            'PPLG XII - 3',
            'DKV XII - 1',
            'DKV XII - 2',
            'DKV XII - 3',
        ];

        foreach ($rombels as $rombel) {
            Rombel::create([
                'name' => $rombel,
            ]);
        }
    }
}
