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
        // $this->call(UsersTableSeeder::class);
        // $this->call(ItemsTableSeeder::class);
        // $this->call(BlogsTableSeeder::class);
        // $this->call(GroupsTableSeeder::class);
        // $this->call(FaqsTableSeeder::class);
        $this->call(VisitsTableSeeder::class);
    }
}
