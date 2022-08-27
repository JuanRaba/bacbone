<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new DataImport, storage_path('app/CPdescarga.xls'));
    }
}
