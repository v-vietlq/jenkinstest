<?php

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page')->insert([
            'title_vi'           => 'Tiêu đề giới thiệu',
            'intro_vi'           => 'Tiếng việt culpa qui officia deserunt mollit anim id est laborum. Sed utem perspiciatis unde omnis iste natus error',
            'content_vi'         => 'Tiếng Việt Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed utem perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaqueiu ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dictaed quia consequuntur magni dolores eos quist ratione voluptatem sequei nesciunt. Neque porro quisquam est qui dolorem ipsum quia dolor sitem amet consectetur adipisci velit sed quianon numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat tatem dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.
            Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.',
            'slug_vi'            => 'gioi-thieu',
            'title_tag_vi'       => 'gioi-thieu',
            'description_tag_en' => 'gioi-thieu',
            'title_en'           => 'Do You Have A Job That The Average Person Doesn’t Even Know Exists?',
            'intro_en'           => 'English Excepteur sint occaecat cupidatat non proident',
            'content_en'         => 'English Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officiaerunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaqueisa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntcabo Nemo enim ipsam voluptatem quia voluptas.
            Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nenti Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, cteturisci velit, sed quia non numquam eius modi.',
            'slug_en'            => 'introduct',
            'title_tag_en'       => 'introduct',
            'description_tag_en' => 'introduct',
            'image'              => '',
            'status'             => 'on',
            'created_at'         => new \DateTime(),
            'updated_at'         => new \DateTime()
        ]);
    }
}
