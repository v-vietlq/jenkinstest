<?php

use Illuminate\Database\Seeder;

class EmployerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employer')->insert(
            [
                [
                    'name_vi'            => 'Công ty A',
                    'address_vi'         => '01 Đường CMT8 Q3',
                    'about_vi'           => 'Giới thiệu công ty A',
                    'slug_vi'            => 'cong-ty-a',
                    'title_tag_vi'       => 'Công Ty A',
                    'keyword_tag_vi'     => 'cong ty a,cong ty',
                    'description_tag_vi' => 'Mô tả giới thiệu công ty A',
                    'name_en'            => 'Company A',
                    'address_en'         => '01 CMT8 Street, District 3',
                    'about_en'           => 'About comany A',
                    'slug_en'            => 'Comapany A',
                    'title_tag_en'       => 'Company A',
                    'keyword_tag_en'     => 'company a, company',
                    'description_tag_en' => 'About Company A',
                    'phone'              => '0901234567',
                    'logo'               => 'https://i.pinimg.com/originals/1c/2e/01/1c2e012b0a2cb334ff1e69c8a43619dc.jpg',
                    'banner'             => 'https://i.pinimg.com/originals/1c/2e/01/1c2e012b0a2cb334ff1e69c8a43619dc.jpg',
                    'viewed'             => 111,
                    'status'             => 'on',
                    'created_at'         => new \DateTime(),
                    'updated_at'         => new \DateTime(),
                ],
                [
                    'name_vi'            => 'CÔNG TY TNHH TM DV PHÁT TRIỂN RỒNG VIỆT',
                    'address_vi'         => '200/20D Ấp Chánh 1, Xã Tân Xuân, Hóc MôN',
                    'about_vi'           => 'Giới thiệu công ty Rồng Việt',
                    'slug_vi'            => 'cong-ty-rong-viet',
                    'title_tag_vi'       => 'Công Ty Rồng Việt',
                    'keyword_tag_vi'     => 'cong ty rong viet,cong ty',
                    'description_tag_vi' => 'Mô tả giới thiệu công ty Rồng Việt',
                    'name_en'            => 'Company Rong Viet',
                    'address_en'         => '200/20D Ấp Chánh 1, Xã Tân Xuân, Hóc MôN',
                    'about_en'           => 'About comany Rong Viet',
                    'slug_en'            => 'Comapany Rong Viet',
                    'title_tag_en'       => 'Company Rong Viet',
                    'keyword_tag_en'     => 'company rong viet, company',
                    'description_tag_en' => 'About Company A',
                    'phone'              => '0969436832',
                    'logo'               => 'https://i.pinimg.com/originals/1c/2e/01/1c2e012b0a2cb334ff1e69c8a43619dc.jpg',
                    'banner'             => 'https://i.pinimg.com/originals/1c/2e/01/1c2e012b0a2cb334ff1e69c8a43619dc.jpg',
                    'viewed'             => 432,
                    'status'             => 'on',
                    'created_at'         => new \DateTime(),
                    'updated_at'         => new \DateTime(),
                ]
            ]
        );
    }
}
