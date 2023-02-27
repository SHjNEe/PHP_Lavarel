<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersCount = $this->command->ask('How many users would you like?', 20);
        factory(App\User::class)->states('john-doe')->create();
        factory(App\User::class, $usersCount)->create();
    }
}
