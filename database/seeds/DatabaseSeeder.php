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
         $this->call(MessagesTableSeeder::class);
         $this->call(ListingImagesTableSeeder::class);
    }
}
