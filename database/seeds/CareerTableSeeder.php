<?php

use Illuminate\Database\Seeder;

class CareerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('career')->insert(
            [
                [
                    'name_vi'            => 'Công nghệ thông tin',
                    'description_vi'     => 'Mô tả ngành nghề công nghệ thông tin',
                    'slug_vi'            => 'cong-nghe-thong-tin',
                    'title_tag_vi'       => 'Công nghệ thông tin',
                    'keyword_tag_vi'     => 'Công nghệ,vi tính,lập trình',
                    'description_tag_vi' => 'Thẻ mô tả ngành công nghệ',
                    'name_en'            => 'Information Technology',
                    'description_en'     => 'Description information technology',
                    'slug_en'            => 'information-technology',
                    'title_tag_en'       => 'Information Technology',
                    'keyword_tag_en'     => 'technology,computer,programing',
                    'description_tag_en' => 'Description tag information technology',
                    'viewed'             => 1000,
                    'status'             => 'on',
                    'created_at'         => new \DateTime,
                    'updated_at'         => new \DateTime,
                ],
                [
                    'name_vi'            => 'Kế toán',
                    'description_vi'     => 'Mô tả ngành nghề kế toán',
                    'slug_vi'            => 'ke-toan',
                    'title_tag_vi'       => 'Kế toán',
                    'keyword_tag_vi'     => 'Kế toán',
                    'description_tag_vi' => 'Thẻ mô tả ngành Kế toán',
                    'name_en'            => ' Accountant',
                    'description_en'     => 'Description Accountant',
                    'slug_en'            => 'accountant',
                    'title_tag_en'       => 'Accountant',
                    'keyword_tag_en'     => 'accountant',
                    'description_tag_en' => 'Description tag Accountant',
                    'viewed'             => 1525,
                    'status'             => 'on',
                    'created_at'         => new \DateTime,
                    'updated_at'         => new \DateTime,
                ], 
                [
                    'name_vi'            => 'Quản trị kinh doanh',
                    'description_vi'     => 'Mô tả ngành nghề Quản trị kinh doanh',
                    'slug_vi'            => 'quan-tri-kinh-doanh',
                    'title_tag_vi'       => 'Quản trị kinh doanh',
                    'keyword_tag_vi'     => 'Quản trị kinh doanh',
                    'description_tag_vi' => 'Thẻ mô tả ngành Quản trị kinh doanh',
                    'name_en'            => 'Business administration',
                    'description_en'     => 'Description  Business administration',
                    'slug_en'            => 'Business administration',
                    'title_tag_en'       => 'Business administration',
                    'keyword_tag_en'     => 'Business administration',
                    'description_tag_en' => 'Description tag Business administration',
                    'viewed'             => 855,
                    'status'             => 'on',
                    'created_at'         => new \DateTime,
                    'updated_at'         => new \DateTime,
                ],
            ]
    );
    }
}
