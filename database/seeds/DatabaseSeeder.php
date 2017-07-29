<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
        // composer require fzaninotto/faker
        //      factory(App\User::class, 50)->create()->each(function ($u) {
        //      $u->users()->save(factory(App\User::class)->make());
        //  });
    }
}
