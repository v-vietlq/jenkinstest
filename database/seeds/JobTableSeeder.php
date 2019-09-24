<?php

use Illuminate\Database\Seeder;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job')->insert(
            [
                [
                    'name_vi'             => 'Lập trình viên Laravel',
                    'age_vi'              => '18',
                    'address_vi'          => '222 CMT8 ,Quận 3,Tp.Hồ Chí Minh',
                    'salary_vi'           => '8',
                    'time_work_vi'        => '8AM - 17PM',
                    'place_work_vi'       => '816 Sư Vạn Hạnh Q.10',
                    'description_vi'      => '',
                    'slug_vi'             => 'lap-trinh-laravel',
                    'title_tag_vi'        => 'lap-trinh-laravel',
                    'keyword_tag_vi'      => 'lap-trinh-laravel',
                    'description_tag_vi'  => 'lap-trinh',
                    'name_en'             => 'Laravel Developers',
                    'age_en'              => '18',
                    'address_en'          => '222 CMT8 ,District 3, Ho Chi Minh city',
                    'salary_en'           => '8',
                    'time_work_en'        => '8AM - 17PM',
                    'place_work_en'       => '816 Sư Vạn Hạnh District 10',
                    'description_en'      => 'developers laravel',
                    'slug_en'             => 'developer-laravel',
                    'title_tag_en'        => 'developer-laravel',
                    'keyword_tag_en'      => 'developer-laravel',
                    'description_tag_en'  => 'developer-laravel',
                    'viewed'              => 298,
                    'banner'              => '',
                    'sticker'             => '1',
                    'status'              => 'on',
                    'city'                => '89',
                    'district'            => '886',
                    'ward'                => '',
                    'post_time_at'        => '01-01-2019',
                    'delete_time_at'      => '01-01-2019',
                    'employer_id'         => 2,
                    'content_vi'          => 'Đây là nội dung Đây là nội dung Đây là nội dung Đây là nội dung ',
                    'welfare_vi'          => 'Đây là welfare_vi Đây là welfare_vi',
                    'contact_info_vi'     => 'Đây là thông tin contact',
                    'contact_info_en'     => 'English - Đây là thông tin contact',
                    'quantity'            => 89,
                    'content_en'          => 'English - Đây là nội dung Đây là nội dung Đây là nội dung Đây là nội dung ',
                    'welfare_en'          => 'English - Đây là welfare_vi Đây là welfare_vi',
                    'created_at'          => new \DateTime(),
                    'updated_at'          => new \DateTime(),
                ],
                [
                    'name_vi'             => 'Nhân viên bán hàng',
                    'age_vi'              => '18-20',
                    'address_vi'          => '283 CMT8 Quận 3',
                    'salary_vi'           => '15',
                    'time_work_vi'        => '8AM - 17PM',
                    'place_work_vi'       => '825 Sư Vạn Hạnh Q.10',
                    'description_vi'      => '',
                    'slug_vi'             => 'nhan-vien-ban-hang',
                    'title_tag_vi'        => 'nhan-vien-ban-hang',
                    'keyword_tag_vi'      => 'nhan-vien-ban-hang',
                    'description_tag_vi'  => '',
                    'name_en'             => 'Sales Person',
                    'age_en'              => '18-20',
                    'address_en'          => '283 CMT8 ,District 3, Ho Chi Minh city',
                    'salary_en'           => '15',
                    'time_work_en'        => '8AM - 17PM',
                    'place_work_en'       => '825 Sư Vạn Hạnh District 5,HCM city',
                    'description_en'      => 'Sale person',
                    'slug_en'             => 'sale-person',
                    'title_tag_en'        => 'sale-person',
                    'keyword_tag_en'      => 'sale-person',
                    'description_tag_en	' => 'sale-person',
                    'viewed'              => 298,
                    'banner'              => '',
                    'sticker'             => '2',
                    'status'              => 'on',
                    'city'                => '79',
                    'district'            => '774',
                    'ward'                => '',
                    'post_time_at'        => '01-01-2019',
                    'delete_time_at'      => '01-01-2019',
                    'employer_id'         => 1,
                    'content_vi'          => '2- Đây là nội dung Đây là nội dung Đây là nội dung Đây là nội dung ',
                    'welfare_vi'          => '2- Đây là welfare_vi Đây là welfare_vi',
                    'contact_info_vi'     => '2- Đây là thông tin contact',
                    'contact_info_en'     => '2- English - Đây là thông tin contact',
                    'quantity'            => 89,
                    'content_en'          => '2- English - Đây là nội dung Đây là nội dung Đây là nội dung Đây là nội dung ',
                    'welfare_en'          => '2- English - Đây là welfare_vi Đây là welfare_vi',
                    'created_at'          => new \DateTime(),
                    'updated_at'          => new \DateTime(),
                ]
            ]
        );
    }
}
