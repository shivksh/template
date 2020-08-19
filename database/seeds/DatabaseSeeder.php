<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(App\UsersModel::class,50)->create();

        factory(App\ProfilesModel::class,50)->create();

        factory(App\PostsModel::class,50)->create();

    }
}
