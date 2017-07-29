<?php

use Illuminate\Database\Seeder;

class StaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Stay::class, 10)->create();
    }
}
