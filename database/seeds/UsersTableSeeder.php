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
        DB::table('users')->insert([
            'email'      => 'admin@jobthom.vn',
            'password'   => bcrypt('12345'),
            'level'      => 1,
            'status'     => 'on',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);

        DB::table('user_info')->insert([
            'fullname'   => 'Superadmin',
            'birthday'   => '31/12/2019',
            'phone'      => '0969436832',
            'email'      => 'quangan.design@gmail.com',
            'address'    => 'Việt Nam',
            'user_id'    => 1,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);
    }
}
