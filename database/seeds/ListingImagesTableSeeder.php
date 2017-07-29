<?php

use Illuminate\Database\Seeder;

class ListingImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\ListingImage::class, 10)->create();
    }
}
