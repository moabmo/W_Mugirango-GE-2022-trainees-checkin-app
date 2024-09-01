<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ward;

class WardSeeder extends Seeder
{
    public function run()
    {
        $wards = [
            'NYAMAIYA',
            'BOGICHORA',
            'BOSAMARO',
            'BONYAMATUTA',
            'TOWNSHIP',
        ];

        foreach ($wards as $ward) {
            Ward::create(['name' => $ward]);
        }
    }
}
