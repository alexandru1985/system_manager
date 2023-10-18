<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class StationsSeeder extends Seeder
{
    public function run(): void
    {
        $companies = DB::table('companies')->get();
        $faker = Factory::create();
        
        $locations = [
            0 => ['latitude' => '51.580469', 'longitude' => '-0.111925', 'address' => '72 Denton Road, London, N8 9LW, United Kingdom'],
            1 => ['latitude' => '51.580469', 'longitude' => '-0.111925', 'address' => '72 Denton Road, London, N8 9LW, United Kingdom'],
            2 => ['latitude' => '51.580469', 'longitude' => '-0.111925', 'address' => '72 Denton Road, London, N8 9LW, United Kingdom'],
            3 => ['latitude' => '51.580469', 'longitude' => '-0.111925', 'address' => '72 Denton Road, London, N8 9LW, United Kingdom'],
            4 => ['latitude' => '51.580469', 'longitude' => '-0.111925', 'address' => '72 Denton Road, London, N8 9LW, United Kingdom'],
            5 => ['latitude' => '51.580063', 'longitude' => '-0.110638', 'address' => '45 Uplands Road, London, N8 9NJ, United Kingdom'],
            6 => ['latitude' => '51.580063', 'longitude' => '-0.110638', 'address' => '45 Uplands Road, London, N8 9NJ, United Kingdom'],
            7 => ['latitude' => '51.580063', 'longitude' => '-0.110638', 'address' => '45 Uplands Road, London, N8 9NJ, United Kingdom'],
            8 => ['latitude' => '51.580063', 'longitude' => '-0.110638', 'address' => '45 Uplands Road, London, N8 9NJ, United Kingdom'],
            9 => ['latitude' => '51.580063', 'longitude' => '-0.110638', 'address' => '45 Uplands Road, London, N8 9NJ, United Kingdom'],
           10 => ['latitude' => '51.579274', 'longitude' => '-0.111754', 'address' => '44 Denton Road, London, N8 9LW, United Kingdom'],
           11 => ['latitude' => '51.579274', 'longitude' => '-0.111754', 'address' => '44 Denton Road, London, N8 9LW, United Kingdom'],
           12 => ['latitude' => '51.579274', 'longitude' => '-0.111754', 'address' => '44 Denton Road, London, N8 9LW, United Kingdom'],
           13 => ['latitude' => '51.579274', 'longitude' => '-0.111754', 'address' => '44 Denton Road, London, N8 9LW, United Kingdom'],
           14 => ['latitude' => '51.579274', 'longitude' => '-0.111754', 'address' => '44 Denton Road, London, N8 9LW, United Kingdom'],
           15 => ['latitude' => '51.584373', 'longitude' => '-0.118792', 'address' => '2 Hermiston Court, London, N8 8NN, United Kingdom'],
           16 => ['latitude' => '51.584373', 'longitude' => '-0.118792', 'address' => '2 Hermiston Court, London, N8 8NN, United Kingdom'],
           17 => ['latitude' => '51.584373', 'longitude' => '-0.118792', 'address' => '2 Hermiston Court, London, N8 8NN, United Kingdom'],
           18 => ['latitude' => '51.584373', 'longitude' => '-0.118792', 'address' => '2 Hermiston Court, London, N8 8NN, United Kingdom'],
           19 => ['latitude' => '51.584373', 'longitude' => '-0.118792', 'address' => '2 Hermiston Court, London, N8 8NN, United Kingdom'],
           20 => ['latitude' => '51.580639', 'longitude' => '-0.110209', 'address' => 'Cranford Way, London, N8 9DG, United Kingdom'],
           21 => ['latitude' => '51.584735', 'longitude' => '-0.116388', 'address' => 'Harold Road, London, N8 7EJ, United Kingdom'],
           22 => ['latitude' => '51.585141', 'longitude' => '-0.117075', 'address' => 'Harold Road, London, N8 7DE, United Kingdom'],
           23 => ['latitude' => '51.584373', 'longitude' => '-0.118792', 'address' => '2 Hermiston Court, London, N8 8NN, United Kingdom'],
           24 => ['latitude' => '51.618492', 'longitude' => '-0.091497', 'address' => 'Dorchester Avenue, London, N13 5EA, United Kingdom'],
           25 => ['latitude' => '51.621199', 'longitude' => '-0.079052', 'address' => 'Westerham Avenue, London, N9 9BP, United Kingdom'],
           26 => ['latitude' => '51.660339', 'longitude' => '-0.088923', 'address' => '6 Holtwhite Avenue, London, EN2 0RS, United Kingdom'],
           27 => ['latitude' => '51.662298', 'longitude' => '-0.094072', 'address' => '23 Hedge Hill, London, EN2 8RU, London, United Kingdom'],
           28 => ['latitude' => '51.674521', 'longitude' => '-0.110294', 'address' => 'Crews Hill, EN2 9BN, London, United Kingdom'],
           29 => ['latitude' => '51.676096', 'longitude' => '-0.117762', 'address' => 'East Lodge Lane, London, EN2 8BA, United Kingdom'],
           30 => ['latitude' => '51.664556', 'longitude' => '-0.083859', 'address' => '30 Burlington Road, London, EN2 0LL, United Kingdom'],
           31 => ['latitude' => '51.664151', 'longitude' => '-0.083258', 'address' => '123 Lancaster Road, London, EN2 0JN, United Kingdom'],
           32 => ['latitude' => '51.661723', 'longitude' => '-0.082743', 'address' => '35 Heene Road, London, EN2 0QG, United Kingdom'],
           33 => ['latitude' => '51.659849', 'longitude' => '-0.081541', 'address' => '49 Gordon Road, London, EN2 0PZ, United Kingdom'],
           34 => ['latitude' => '51.661894', 'longitude' => '-0.080769', 'address' => '21-23 Farr Road, London, EN2 0DE, United Kingdom'],
           35 => ['latitude' => '51.661809', 'longitude' => '-0.080511', 'address' => '12 Farr Road, London, EN2 0DE, United Kingdom'],
           36 => ['latitude' => '51.663318', 'longitude' => '-0.078391', 'address' => '22-32 Lancaster Road, London, EN2 0JN, United Kingdom'],
           37 => ['latitude' => '51.663496', 'longitude' => '-0.078886', 'address' => '41-43 Lancaster Road, London, EN2 0JN, United Kingdom'],
           38 => ['latitude' => '51.665182', 'longitude' => '-0.082642', 'address' => '30 Browning Road, London, EN2 0DN, United Kingdom'],
           39 => ['latitude' => '51.664925', 'longitude' => '-0.082411', 'address' => '20 Browning Road, London, EN2 0DN, United Kingdom'],
           40 => ['latitude' => '51.664764', 'longitude' => '-0.082245', 'address' => '5 Browning Road, London, EN2 0DN, United Kingdom'],
           41 => ['latitude' => '51.664001', 'longitude' => '-0.082047', 'address' => '114 Lancaster Road, London, EN2 0JN, United Kingdom'],
           42 => ['latitude' => '51.663851', 'longitude' => '-0.085379', 'address' => '186 Lancaster Road, London, EN2 0JH, United Kingdom'],
           43 => ['latitude' => '51.664461', 'longitude' => '-0.084531', 'address' => '50 Burlington Road, London, EN2 0LL, United Kingdom'],
           44 => ['latitude' => '51.664477', 'longitude' => '-0.084256', 'address' => '42 Burlington Road, London, EN2 0LL, United Kingdo'],
           45 => ['latitude' => '51.658208', 'longitude' => '-0.097186', 'address' => '28 Rowantree Road, London, EN2 8PY, United Kingdom'],
           46 => ['latitude' => '51.658033', 'longitude' => '-0.096778', 'address' => '68 Chase Green Avenue, London, EN2 6SJ, United Kingdom'],
           47 => ['latitude' => '51.658008', 'longitude' => '-0.096437', 'address' => '60 Chase Green Avenue, London, EN2 6SJ, United Kingdom'],
           48 => ['latitude' => '51.657915', 'longitude' => '-0.096051', 'address' => '56 Chase Green Avenue, London, EN2 6SJ, United Kingdom'],
           49 => ['latitude' => '51.657836', 'longitude' => '-0.095688', 'address' => '50, 52 Chase Green Avenue, London, EN2 6SJ, United Kingdom'],
           50 => ['latitude' => '51.657067', 'longitude' => '-0.109423', 'address' => 'Camp Road, London, EN2 7ES, United Kingdom'],
           51 => ['latitude' => '51.649325', 'longitude' => '-0.083037', 'address' => '36-42 Raleigh Road, London, EN2 6UB, United Kingdom'],
           52 => ['latitude' => '51.652569', 'longitude' => '-0.107148', 'address' => 'Links Side, London, EN2 7QZ, United Kingdom'],
           53 => ['latitude' => '51.650014', 'longitude' => '-0.082915', 'address' => '3 Raleigh Road, London, EN2 6UB, United Kingdom'],
           54 => ['latitude' => '51.649826', 'longitude' => '-0.082926', 'address' => '30 Raleigh Road, London, EN2 6UB, United Kingdom'],
           55 => ['latitude' => '51.646917', 'longitude' => '-0.083081', 'address' => '34 Walsingham Road, London, EN2 6EX, United Kingdom'],
           56 => ['latitude' => '51.645985', 'longitude' => '-0.081516', 'address' => '1 Walsingham Road, London, EN2 6EX, United Kingdom'],
           57 => ['latitude' => '51.642221', 'longitude' => '-0.077054', 'address' => 'Village Road, London, EN1 2ER, United Kingdom'],
           58 => ['latitude' => '51.642557', 'longitude' => '-0.069399', 'address' => '52B First Avenue, London, EN1 1BP, United Kingdom'],
           59 => ['latitude' => '51.643833', 'longitude' => '-0.070524', 'address' => '73 First Avenue, London, EN1 1BW, United Kingdom'],
           60 => ['latitude' => '51.644381', 'longitude' => '-0.071009', 'address' => '95 First Avenue, London, EN1 1BP, United Kingdom'],
           61 => ['latitude' => '51.646711', 'longitude' => '-0.055667', 'address' => '41 Lincoln Way, London, EN1 1TD, United Kingdom'],
           62 => ['latitude' => '51.644517', 'longitude' => '-0.053993', 'address' => '2 Lincoln Way, London, EN3 4AA, United Kingdom'],
           63 => ['latitude' => '51.641741', 'longitude' => '-0.045454', 'address' => 'Rydal Way, London, EN3 4PQ, United Kingdom'],
           64 => ['latitude' => '51.641227', 'longitude' => '-0.044573', 'address' => '2 Rydal Way, London, EN3 4PQ, United Kingdom'],
           65 => ['latitude' => '51.632294', 'longitude' => '-0.041735', 'address' => '56 Charlton Road, London, N9 8UN, United Kingdom'],
           66 => ['latitude' => '51.631996', 'longitude' => '-0.041812', 'address' => '44 Charlton Road, London, N9 8UN, United Kingdom'],
           67 => ['latitude' => '51.630869', 'longitude' => '-0.046809', 'address' => 'Woodlands Road, London, N9 8RR, United Kingdom'],
        ];

        $stations = [];

        for ($i = 0; $i <= 67; $i++) {
            $stations [] = [
                'company_id' => $companies->random()->id,
                'name' => $faker->company(),
                'latitude' => $locations[$i]['latitude'],
                'longitude' => $locations[$i]['longitude'],
                'address' => $locations[$i]['address'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('stations')->insert($stations);
    }
}
