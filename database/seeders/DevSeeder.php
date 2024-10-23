<?php

namespace Database\Seeders;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Database\Seeder;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }

        User::factory(rand(5, 10))->create()
            ->each(
                fn(User $user) => Chirp::factory(rand(10, 20)
            )->create(
                ['user_id' => $user->id]
            ));
    }
}
