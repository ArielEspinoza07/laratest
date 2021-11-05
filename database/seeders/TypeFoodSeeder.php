<?php

namespace Database\Seeders;

use App\Models\TypeFood;
use Illuminate\Database\Seeder;

class TypeFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment() !== 'prod') {
            TypeFood::factory(3)
                ->create();
        }
    }
}
