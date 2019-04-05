<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubmitLinksTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    function guest_can_submit_a_new_link() {
        $response = $this->post('/submit', [
            'title' => 'Example Title',
            'url' => 'http://example.com',
            'description' => 'Example description.',
        ]);

        $this->assertDatabaseHas('links', [
            'title' => 'Example Title'
        ]);

        $response
            ->assertStatus(302)
            ->assertHeader('Example Title');
    }

    /** @test */
    function link_is_not_created_if_validation_fails() {
        $response = $this->post('/submit');
        $response->assertSessionHasErrors(['title', 'url', 'description']);
    }

    /** @test */
    function link_is_not_created_with_an_invalid_url() {}

    /** @test */
    function max_length_fails_when_too_long() {}

    /** @test */
    function max_length_succeeds_when_under_max() {}
    
}
