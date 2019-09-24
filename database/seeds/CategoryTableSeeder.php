<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:: table('category')->insert(
            [
                [
                    'name_vi'    => 'Thuộc tính',
                    'name_en'    => 'Attribute',
                    'slug_vi'    => 'thuoc-tinh',
                    'value_vi'   => 'thuoc-tinh',
                    'slug_en'    => 'attribute',
                    'value_en'   => 'attribute',
                    'status'     => 'on',
                    'position'   => 1,
                    'parent'     => 0,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Ngành nghề',
                    'name_en'    => 'Career',
                    'slug_vi'    => 'nganh-nghe',
                    'slug_en'    => 'career',
                    'value_vi'   => 'nganh-nghe',
                    'value_en'   => 'career',
                    'status'     => 'on',
                    'position'   => 1,
                    'parent'     => 1,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Kinh nghiệm',
                    'name_en'    => 'Experience',
                    'slug_vi'    => 'kinh-nghiem',
                    'slug_en'    => 'experience',
                    'value_vi'   => 'kinh-nghiem',
                    'value_en'   => 'experience',
                    'status'     => 'on',
                    'position'   => 2,
                    'parent'     => 1,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Mức lương',
                    'name_en'    => 'Salary',
                    'slug_vi'    => 'kinh-nghiem',
                    'slug_en'    => 'salary',
                    'value_vi'   => 'kinh-nghiem',
                    'value_en'   => 'salary',
                    'status'     => 'on',
                    'position'   => 3,
                    'parent'     => 1,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Giới tính',
                    'name_en'    => 'Gender',
                    'slug_vi'    => 'gioi-tinh',
                    'slug_en'    => 'gender',
                    'value_vi'   => 'gioi-tinh',
                    'value_en'   => 'gender',
                    'status'     => 'on',
                    'position'   => 4,
                    'parent'     => 1,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Thời gian',
                    'name_en'    => 'Time',
                    'slug_vi'    => 'thoi-gian',
                    'slug_en'    => 'time',
                    'value_vi'   => 'thoi-gian',
                    'value_en'   => 'time',
                    'status'     => 'on',
                    'position'   => 5,
                    'parent'     => 1,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Tất cả',
                    'name_en'    => 'All',
                    'slug_vi'    => 'tat-ca',
                    'slug_en'    => 'all',
                    'value_vi'   => 'tat-ca',
                    'value_en'   => 'all',
                    'status'     => 'on',
                    'position'   => 1,
                    'parent'     => 2,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Kinh doanh',
                    'name_en'    => 'Business',
                    'slug_vi'    => 'kinh-doanh',
                    'slug_en'    => 'business',
                    'value_vi'   => 'kinh-doanh',
                    'value_en'   => 'business',
                    'status'     => 'on',
                    'position'   => 2,
                    'parent'     => 2,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'PG/PB/Bán hàng',
                    'name_en'    => 'PG/PB/Sell',
                    'slug_vi'    => 'pg-pb',
                    'slug_en'    => 'pg-pb',
                    'value_vi'   => 'pg-pb',
                    'value_en'   => 'pg-pb',
                    'status'     => 'on',
                    'position'   => 3,
                    'parent'     => 2,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Kỹ thuật',
                    'name_en'    => 'Technology',
                    'slug_vi'    => 'ky-thuat',
                    'slug_en'    => 'technology',
                    'value_vi'   => 'ky-thuat',
                    'value_en'   => 'technology',
                    'status'     => 'on',
                    'position'   => 4,
                    'parent'     => 2,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Tất cả',
                    'name_en'    => 'All',
                    'slug_vi'    => 'tat-ca',
                    'slug_en'    => 'all',
                    'value_vi'   => 'tat-ca',
                    'value_en'   => 'all',
                    'status'     => 'on',
                    'position'   => 1,
                    'parent'     => 3,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Không có kinh nghiệm',
                    'name_en'    => 'No experience',
                    'slug_vi'    => 'khong-co-kinh-nghiem',
                    'slug_en'    => 'no-experience',
                    'value_vi'   => 'khong-co-kinh-nghiem',
                    'value_en'   => 'no-experience',
                    'status'     => 'on',
                    'position'   => 2,
                    'parent'     => 3,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => '6 tháng - 1 năm',
                    'name_en'    => '6 months - 1 year',
                    'slug_vi'    => '6-thang-1-nam',
                    'slug_en'    => '6-months-1-year',
                    'value_vi'   => '6-thang-1-nam',
                    'value_en'   => '6-months-1-year',
                    'status'     => 'on',
                    'position'   => 3,
                    'parent'     => 3,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Tất cả',
                    'name_en'    => 'All',
                    'slug_vi'    => 'tat-ca',
                    'slug_en'    => 'all',
                    'value_vi'   => 'tat-ca',
                    'value_en'   => 'all',
                    'status'     => 'on',
                    'position'   => 1,
                    'parent'     => 4,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => '5 - 7 triệu',
                    'name_en'    => '5 - 7 millions',
                    'slug_vi'    => '5-7-trieu',
                    'slug_en'    => '5-7-millions',
                    'value_vi'   => '5-7-trieu',
                    'value_en'   => '5-7-millions',
                    'status'     => 'on',
                    'position'   => 2,
                    'parent'     => 4,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => '7 - 10 triệu',
                    'name_en'    => '7 - 10 millions',
                    'slug_vi'    => '7-10-trieu',
                    'slug_en'    => '7-10-millions',
                    'value_vi'   => '7-10-trieu',
                    'value_en'   => '7-10-millions',
                    'status'     => 'on',
                    'position'   => 3,
                    'parent'     => 4,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Tất cả',
                    'name_en'    => 'All',
                    'slug_vi'    => 'tat-ca',
                    'slug_en'    => 'all',
                    'value_vi'   => 'tat-ca',
                    'value_en'   => 'all',
                    'status'     => 'on',
                    'position'   => 1,
                    'parent'     => 5,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Nam',
                    'name_en'    => 'Male',
                    'slug_vi'    => 'Nam',
                    'slug_en'    => 'male',
                    'value_vi'   => 'Nam',
                    'value_en'   => 'male',
                    'status'     => 'on',
                    'position'   => 2,
                    'parent'     => 5,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Nữ',
                    'name_en'    => 'Female',
                    'slug_vi'    => 'nu',
                    'slug_en'    => 'female',
                    'value_vi'   => 'nu',
                    'value_en'   => 'female',
                    'status'     => 'on',
                    'position'   => 3,
                    'parent'     => 5,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Tất cả',
                    'name_en'    => 'All',
                    'slug_vi'    => 'tat-ca',
                    'slug_en'    => 'all',
                    'value_vi'   => 'tat-ca',
                    'value_en'   => 'all',
                    'status'     => 'on',
                    'position'   => 1,
                    'parent'     => 6,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Tất cả thời gian',
                    'name_en'    => 'All the time',
                    'slug_vi'    => 'tat-ca-thoi-gian',
                    'slug_en'    => 'all-the-time',
                    'value_vi'   => 'tat-ca-thoi-gian',
                    'value_en'   => 'all-the-time',
                    'status'     => 'on',
                    'position'   => 2,
                    'parent'     => 6,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Bán thời gian',
                    'name_en'    => 'Part-time',
                    'slug_vi'    => 'ban-thoi-gian',
                    'slug_en'    => 'part-time',
                    'value_vi'   => 'ban-thoi-gian',
                    'value_en'   => 'part-time',
                    'status'     => 'on',
                    'position'   => 3,
                    'parent'     => 6,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Tin tức',
                    'name_en'    => 'News',
                    'slug_vi'    => 'tin-tuc',
                    'slug_en'    => 'news',
                    'value_vi'   => '',
                    'value_en'   => '',
                    'status'     => 'on',
                    'position'   => 2,
                    'parent'     => 0,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Tin giải trí',
                    'name_en'    => 'Entertain',
                    'slug_vi'    => 'giai-tri',
                    'slug_en'    => 'entertain',
                    'value_vi'   => '',
                    'value_en'   => '',
                    'status'     => 'on',
                    'position'   => 1,
                    'parent'     => 23,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
                [
                    'name_vi'    => 'Thời sự',
                    'name_en'    => 'News',
                    'slug_vi'    => 'thoi-su',
                    'slug_en'    => 'news',
                    'value_vi'   => '',
                    'value_en'   => '',
                    'status'     => 'on',
                    'position'   => 2,
                    'parent'     => 23,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ],
            ]
        );
    }
}
