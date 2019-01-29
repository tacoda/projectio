<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LikesTest extends TestCase
{
    use RefreshDatabase;

    protected $post;

    public function setUp() {
        parent::setUp();
        $this->signIn();
    }

    /** @test */
    public function a_user_can_like_a_post() {
        $post = $this->createPost();
        $post->like();
        $this->assertDatabaseHas('likes', [
            'user_id' => $this->user->id,
            'likeable_id' => $post->id,
            'likeable_type' => get_class($post)
        ]);
        $this->assertTrue($post->isLiked());
    }

    /** @test */
    public function a_user_can_unlike_a_post() {
        $post = $this->createPost();
        $post->like();
        $post->unlike();
        $this->assertDatabaseMissing('likes', [
            'user_id' => $this->user->id,
            'likeable_id' => $post->id,
            'likeable_type' => get_class($post)
        ]);
        $this->assertFalse($post->isLiked());
    }

    /** @test */
    public function a_post_knows_how_many_likes_it_has() {
        $post = $this->createPost();
        $post->like();
        $this->assertEquals(1, $post->likesCount());
    }

    /** @test */
    public function a_post_will_delete_all_of_its_likes_when_it_is_deleted() {
        $post = $this->createPost();
        $post->like();
        $this->signIn();
        $post->like();
        $this->signIn();
        $post->like();
        $this->assertEquals(3, $post->likesCount());
        $post->delete();
        $this->assertEquals(0, $post->likesCount());
    }

    /** @test */
    public function a_user_can_like_a_comment() {
        $comment = $this->createComment();
        $comment->like();
        $this->assertDatabaseHas('likes', [
            'user_id' => $this->user->id,
            'likeable_id' => $comment->id,
            'likeable_type' => get_class($comment)
        ]);
        $this->assertTrue($comment->isLiked());
    }

    /** @test */
    public function a_user_can_unlike_a_comment() {
        $comment = $this->createComment();
        $comment->like();
        $comment->unlike();
        $this->assertDatabaseMissing('likes', [
            'user_id' => $this->user->id,
            'likeable_id' => $comment->id,
            'likeable_type' => get_class($comment)
        ]);
        $this->assertFalse($comment->isLiked());
    }

    /** @test */
    public function a_comment_knows_how_many_likes_it_has() {
        $comment = $this->createComment();
        $comment->like();
        $this->assertEquals(1, $comment->likesCount());
    }

    /** @test */
    public function a_comment_will_delete_all_of_its_likes_when_it_is_deleted() {
        $comment = $this->createComment();
        $comment->like();
        $this->signIn();
        $comment->like();
        $this->signIn();
        $comment->like();
        $this->assertEquals(3, $comment->likesCount());
        $comment->delete();
        $this->assertEquals(0, $comment->likesCount());
    }
}
