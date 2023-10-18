<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{
    public function run(): void
    {
        $companiesNames = [
            'Top Level Electric Ltd',
            'Fast Charger Ltd',
            'Resource Ltd'
        ];

        $companies = [];

        for ($i = 0; $i < 3; $i++) {
            $companies[] = [
                'name' => $companiesNames[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('companies')->insert($companies);
    }
}
