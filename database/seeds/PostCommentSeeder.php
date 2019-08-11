<?php

use Illuminate\Database\Seeder;

class PostCommentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $content = ' テニス大好き、ダミー文章です。テスト用　テニス大好き、ダミー文章です。テスト用　テニス大好き、ダミー文章です。テスト用　テニス大好き、ダミー文章です。テスト用　テニス大好き、ダミー文章です。テスト用　テニス大好き、ダミー文章です。テスト用　テニス大好き、ダミー文章です。テスト用';
    
        $commentdammy = '錦織選手、大坂選手、テニス応援';
    
        for( $i = 1 ; $i <= 10 ; $i++) {
            $post = new Post;
            $post->title = "$i 番目の投稿";
            $post->content = $content;
            $post->save();
    
            $maxComments = mt_rand(3, 15);
            for ($j=0; $j <= $maxComments; $j++) {
                $comment = new Comment;
                $comment->commenter = '名無しさん';
                $comment->comment = $commentdammy;
    
                $post->comments()->save($comment);
                $post->increment('comment_count');
            }
        }

    }
}
