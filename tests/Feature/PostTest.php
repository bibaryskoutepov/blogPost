<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{

    use RefreshDatabase;

    public function testNoPostsWhenNothingInTheDatabase()
    {
        $response = $this->get('/posts');
        $response->assertSeeText('No posts yet!');


    }
    public function testSee1PostWhenThereIs1WithNoComments()
    {
//        Arrange part
        $post = $this->createDummyBlogPost();


//        Act part
        $response = $this->get('/posts');

//        Assert
        $response->assertSeeText('New title');
        $response->assertSeeText('No comments yet!');
        $this->assertDatabaseHas('blog_posts',[
            'title' => 'New title'
        ]);
    }
    public function testSee1BlogPostWithComments()
    {
        //        Arrange part
        $post = $this->createDummyBlogPost();
        Comment::factory(4)->create([
            'blog_post_id'=>$post->id
        ]);

        $response = $this->get('/posts');
        $response->assertSeeText('4 comments');

    }

    public function testStoreValid()
    {
        $params = [
            'title' => 'Valid title',
            'content' => 'Valid content to the valid title'
        ];

        $this->post('/posts',$params)
            ->assertStatus(302)
            ->assertSessionHas('created');

        $this->assertEquals(session('created'),'Blog Post was created');
    }

    public function testStoreFail()
    {
        $params = [
            'title' => 'Vali',
            'content' => 'Vali'
        ];

        $this->post('/posts',$params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $messages = session('errors')->getMessages();

        $this->assertEquals($messages['title'][0], 'The title must be at least 5 characters.');
        $this->assertEquals($messages['content'][0], 'The content must be at least 10 characters.');

    }

    public function testUpdateValid()
    {
        $post = $this->createDummyBlogPost();

        $this->assertEquals(BlogPost::find(1)->toArray(),$post->toArray());

        $params = [
            'title' => 'Valid title',
            'content' => 'Valid content to the valid title'
        ];

        $this->put("posts/{$post->id}",$params)
            ->assertStatus(302)
            ->assertSessionHas('updated');

        $this->assertEquals(session('updated'), 'Blog Post was updated!');
        $this->assertNotEquals(BlogPost::find(1)->toArray(),$post->toArray());

        $this->assertDatabaseHas('blog_posts',[
            'title' => 'Valid title'
        ]);


    }

    public function testDeleteValid()
    {
        $post = $this->createDummyBlogPost();
        $this->assertDatabaseHas('blog_posts',['title' => $post->toArray()['title']]);
        $this->delete("posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('deleted');

        $this->assertEquals(session('deleted'),'Blog Post was deleted!');
        $this->assertDatabaseMissing('blog_posts',['title' => $post->toArray()['title']]);

    }
    private function createDummyBlogPost():BlogPost
    {
//
//        $post = new BlogPost();
//        $post->title = 'New title';
//        $post->content = 'Content of the new title';
//        $post->save();
//
//        return $post;
        return BlogPost::factory()->newTitle()->create();
    }
}
