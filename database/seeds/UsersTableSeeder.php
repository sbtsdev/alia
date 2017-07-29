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
        factory(App\Models\User::class, 10)->create();
        //factory(App\Models\User::class, 10)->create()->each(function ($u) {
            //$u->users()->save(factory(App\User::class)->make());
            //            $u->churches()->save(factory(App\Models\Church::class)->make());
            //            $u->listings()->save(factory(App\Models\Listing::class)->make());
            //}
        //);

        /*
        factory(App\Models\Church::class, 10)->create()->each(function ($u) {
            //$u->users()->save(factory(App\User::class)->make());
            //            $u->churches()->save(factory(App\Models\User::class)->make());
        });
        factory(App\Models\Listing::class, 10)->create()->each(function ($u) {
            //$u->users()->save(factory(App\User::class)->make());
            //            $u->churches()->save(factory(App\Models\User::class)->make());
        });

        factory(App\Models\Stay::class, 10)->create()->each(function ($u) {
            //$u->users()->save(factory(App\User::class)->make());
            //            $u->churches()->save(factory(App\Models\User::class)->make());
        });
         */
    }
}
