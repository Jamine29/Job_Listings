<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyUser;

class CompanyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyUser::factory()
                ->times(20)
                ->create();
    }
}
