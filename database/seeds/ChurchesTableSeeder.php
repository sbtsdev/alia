<?php

use Illuminate\Database\Seeder;

class ChurchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Church::class, 10)->create();
    }
}
