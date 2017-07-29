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
         $this->call(ChurchesTableSeeder::class);
         $this->call(ListingsTableSeeder::class);
         $this->call(StaysTableSeeder::class);
        // composer require fzaninotto/faker
        //      factory(App\User::class, 50)->create()->each(function ($u) {
        //      $u->users()->save(factory(App\User::class)->make());
        //  });
    }
}
