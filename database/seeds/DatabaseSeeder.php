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
        $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(EmployerTableSeeder::class);
        $this->call(CareerTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(JobTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(CategoryJobTableSeeder::class);
    }
}
