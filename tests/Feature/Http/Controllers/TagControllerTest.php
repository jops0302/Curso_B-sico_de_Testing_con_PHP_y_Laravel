<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testExample()
    {
        $this->post('tags', ['name' => 'PHP'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('tags', ['name' => 'PHP']);
    }

    public function testDestroy()
    {
        $tag = Tag::factory()->create();

        $this->delete("tags/$tag->id")
            ->assertRedirect('/');

        $this->assertDatabaseMissing('tags', ['name' => $tag->name]);
    }

    public function testValidate()
    {
        $this->post('tags', ['name' => ''])
            ->assertSessionHasErrors('name');
    }
}
