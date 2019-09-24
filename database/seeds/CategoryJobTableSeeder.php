<?php

use Illuminate\Database\Seeder;

class CategoryJobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_job')->insert(
            [
                [
                    'category_id' => '15',
                    'job_id'      => '1'
                ],
                [
                    'category_id' => '12',
                    'job_id'      => '1'
                ],
                [
                    'category_id' => '8',
                    'job_id'      => '1'
                ],
                [
                    'category_id' => '19',
                    'job_id'      => '1'
                ],
                [
                    'category_id' => '22',
                    'job_id'      => '1'
                ],
                [
                    'category_id' => '12',
                    'job_id'      => '2'
                ],
                [
                    'category_id' => '16',
                    'job_id'      => '2'
                ],
                [
                    'category_id' => '8',
                    'job_id'      => '2'
                ],
                [
                    'category_id' => '18',
                    'job_id'      => '2'
                ],
                [
                    'category_id' => '21',
                    'job_id'      => '2'
                ],
            ] 
        );
    }
}
