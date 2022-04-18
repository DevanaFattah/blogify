<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;

class ViewPostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_view_can_be_rendered()
    {
        // $this->assertTrue(true);
        $view = $this->view('posts', ['posts' => Post::latest()->paginate(7)]);

        $view->assertSee(Post::latest()->paginate(7));
    }
}
