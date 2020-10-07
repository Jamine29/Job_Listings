<?php

namespace Database\Factories;

use App\Models\CompanyUsers;
use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyUsersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyUsers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userId = \App\Models\User::inRandomOrder()->first()->id;
        $companyId = \App\Models\Company::inRandomOrder()->first()->id;

        if(CompanyUsers::where('userId', '=', $userId)->where('companyId', '=', $companyId) !== null) {
            $companyId = Company::factory('App\Models\Company')->create()->id;
        }

        $returnArray = array('userId'=>$userId, 'companyId'=>$companyId);

        return $returnArray;
    }
}
