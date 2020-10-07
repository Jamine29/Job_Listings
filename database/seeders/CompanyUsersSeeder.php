<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyUsers;

class CompanyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyUsers::factory()
                ->times(20)
                ->create();
    }
}
