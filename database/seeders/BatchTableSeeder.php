<?php

namespace Database\Seeders;

use App\Models\Batch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
class BatchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batches=[
            [
                'batch_year'=>2075
            ],
            [
                'batch_year'=>2076
            ],
            [
                'batch_year'=>2077
            ],
            [
                'batch_year'=>2078
            ],
            [
                'batch_year'=>2079
            ],
            [
                'batch_year'=>2080
            ],


        ];
        Schema::disableForeignKeyConstraints();
        Batch::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($batches as $batch) {
            Batch::create($batch);

        }

    }
}
