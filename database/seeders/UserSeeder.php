<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment() !== 'prod') {
            User::factory(10)
                ->create();
        }
        User::query()
            ->create([
                'name'              => 'aespinoza',
                'email'             => 'ariel.espinoza@oktara.com',
                'password'          => '123456789',
                'email_verified_at' => now(),
            ]);
    }
}
