<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()
                ->times(5)
                ->create();

        foreach(Company::all() as $company) {
            $users =  \App\Models\User::inRandomOrder()->take(rand(1,4))->pluck('id');

            for($i = 0; $i < count($users); $i++) {
                if($i === 0) {
                    $company->users()->attach($users[$i], ['isManager' => 1]);
                }
                else {
                    $company->users()->attach($users[$i], ['isManager' => rand(0,1)]);
                }
            }
        }
    }
}
