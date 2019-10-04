<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert(
            [
                [
                    'title_vi'            => 'Tiêu đề tin tức 1',
                    'author_vi'           => 'anh khoa',
                    'intro_vi'            => 'Mô tả tin tức 1 Mô tả tin tức 1',
                    'content_vi'          => 'Nội dung tin tức 1 Nội dung tin tức 1 Nội dung tin tức 1 Nội dung tin tức 1 Nội dung tin tức 1 Nội dung tin tức 1 Nội dung tin tức 1',
                    'slug_vi'             => 'tin-tuc-1',
                    'title_tag_vi'        => 'tin-tuc',
                    'keyword_tag_vi'      => 'tin-tuc',
                    'description_tag_vi'  => 'tin-tuc',
                    'title_en'            => 'Title news 1',
                    'author_en'           => 'anh khoa',
                    'intro_en'            => 'Intro news 1 Intro news 1',
                    'content_en'          => 'Content news 2 Content news 2 Content news 2 Content news 2 Content news 2 Content news 2 Content news 2',
                    'slug_en'             => 'news-1',
                    'title_tag_en'        => 'news-1',
                    'keyword_tag_en'      => 'news-1',
                    'description_tag_en'  => 'news-1',
                    'images'              => 'https: //i.pinimg.com/originals/1c/2e/01/1c2e012b0a2cb334ff1e69c8a43619dc.jpg',
                    'status'              => 'on',
                    'featured'            => 'on',
                    'category_id'         => 24,
                    'created_at'          => new \DateTime(),
                    'updated_at'          => new \DateTime(),
        
                ],
                [
                    'title_vi'            => 'Tiêu đề tin tức 2',
                    'author_vi'           => 'anh khoa',
                    'intro_vi'            => 'Mô tả tin tức 2',
                    'content_vi'          => 'Nội dung tin tức 2',
                    'slug_vi'             => 'tin-tuc-2',
                    'title_tag_vi'        => 'tin-tuc',
                    'keyword_tag_vi'      => 'tin-tuc',
                    'description_tag_vi'  => 'tin-tuc',
                    'title_en'            => 'Title news 2',
                    'author_en'           => 'anh khoa',
                    'intro_en'            => 'Intro news 2',
                    'content_en'          => 'Content news 2 Content news 2 Content news 2 Content news 2 Content news 2 Content news 2 Content news 2 Content news 2',
                    'slug_en'             => 'news-2',
                    'title_tag_en'        => 'news-2',
                    'keyword_tag_en'      => 'news-2',
                    'description_tag_en'  => 'news-2',
                    'images'              => 'https: //i.pinimg.com/originals/1c/2e/01/1c2e012b0a2cb334ff1e69c8a43619dc.jpg',
                    'status'              => 'on',
                    'featured'            => 'on',
                    'category_id'         => 25,
                    'created_at'          => new \DateTime(),
                    'updated_at'          => new \DateTime(),
        
                ],
                [
                    'title_vi'            => 'Tiêu đề tin tức 3',
                    'author_vi'           => 'anh khoa',
                    'intro_vi'            => 'Mô tả tin tức 3',
                    'content_vi'          => 'Nội dung tin tức 3 Nội dung tin tức 3 Nội dung tin tức 3 Nội dung tin tức 3 Nội dung tin tức 3 Nội dung tin tức 3 Nội dung tin tức 3 Nội dung tin tức 3',
                    'slug_vi'             => 'tin-tuc-3',
                    'title_tag_vi'        => 'tin-tuc',
                    'keyword_tag_vi'      => 'tin-tuc',
                    'description_tag_vi'  => 'tin-tuc',
                    'title_en'            => 'Title news 3',
                    'author_en'           => 'anh khoa',
                    'intro_en'            => 'Intro news 3',
                    'content_en'          => 'Content news 3 Content news 3 Content news 3 Content news 3 Content news 3 Content news 3 Content news 3 Content news 3 Content news 3 Content news 3 Content news 3',
                    'slug_en'             => 'news-3',
                    'title_tag_en'        => 'news-3',
                    'keyword_tag_en'      => 'news-3',
                    'description_tag_en'  => 'news-3',
                    'images'              => 'https: //i.pinimg.com/originals/1c/2e/01/1c2e012b0a2cb334ff1e69c8a43619dc.jpg',
                    'status'              => 'on',
                    'featured'            => 'on',
                    'category_id'         => 24,
                    'created_at'          => new \DateTime(),
                    'updated_at'          => new \DateTime(),
        
                ],
                [
                    'title_vi	'           => 'Tiêu đề tin tức 4',
                    'author_vi'           => 'anh khoa',
                    'intro_vi'            => 'Mô tả tin tức 4',
                    'content_vi'          => 'Nội dung tin tức 4 Nội dung tin tức 4 Nội dung tin tức 4 Nội dung tin tức 4 Nội dung tin tức 4 Nội dung tin tức 4 Nội dung tin tức 4 Nội dung tin tức 4 Nội dung tin tức 4 Nội dung tin tức 4',
                    'slug_vi'             => 'tin-tuc-4',
                    'title_tag_vi'        => 'tin-tuc',
                    'keyword_tag_vi'      => 'tin-tuc',
                    'description_tag_vi	' => 'tin-tuc',
                    'title_en'            => 'Title news 4',
                    'author_en'           => 'anh khoa',
                    'intro_en'            => 'Intro news 4',
                    'content_en'          => 'Content news 4 Content news 4 Content news 4 Content news 4 Content news 4 Content news 4 Content news 4 Content news 4 Content news 4 Content news 4 Content news 4 Content news 4 Content news 4 Content news 4',
                    'slug_en'             => 'news-4',
                    'title_tag_en'        => 'news-4',
                    'keyword_tag_en'      => 'news-4',
                    'description_tag_en'  => 'news-4',
                    'images'              => 'https: //i.pinimg.com/originals/1c/2e/01/1c2e012b0a2cb334ff1e69c8a43619dc.jpg',
                    'status'              => 'on',
                    'featured'            => 'on',
                    'category_id'         => 25,
                    'created_at'          => new \DateTime(),
                    'updated_at'          => new \DateTime(),
        
                ]
            ]
        );
    }
}
