<?php

namespace Tests\Feature;

use Tests\TestCase;
Use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_unauth_user_cant_access_view_all_his_post()
    {   
        $response = $this->get('/dashboard/posts');

        $response->assertStatus(302);

        $response->assertRedirect('/login');
    }

    public function test_auth_user_can_see_view_all_post()
    {   
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->get('/dashboard/posts')->assertStatus(200);
    }
    
    public function test_auth_user_can_see_form_create_post()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->get('/dashboard/posts/create')->assertStatus(200);
    }

    public function test_auth_user_can_create_post()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $post = Post::factory()->create();

        $response = $this->post('/dashboard/posts',[
            'title' => $post['title'],
            'slug' => $post['slug'],
            'category_id' => $post['category_id'],
            'body' => $post['body']
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard/posts');
    }

    public function test_auth_user_can_see_detail_post() 
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $post = Post::factory()->create();

        $response = $this->get('/dashboard/posts/'. $post['id']);
        $response->assertStatus(200);
    }

    public function test_auth_user_can_see_form_update_post()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $post = Post::factory()->create();

        $response = $this->get('/dashboard/posts/'. $post['id'] .'/edit');
        $response->assertStatus(200);
    }

    public function test_auth_user_can_update_post() 
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $post = Post::factory()->create();

        $response = $this->put('/dashboard/posts/'. $post['id'],[
            'title' => $post['title'],
            'slug' => $post['slug'],
            'category_id' => $post['category_id'],
            'body' => 'lorem'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard/posts');
    }

    public function test_auth_user_can_delete_post() 
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $post = Post::factory()->create();

        $response = $this->delete('/dashboard/posts/'. $post['id']);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard/posts');
    }
}
