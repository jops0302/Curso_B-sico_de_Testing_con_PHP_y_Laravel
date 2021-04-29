<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Tag;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function testEmpty()
    {
        $this
            ->get('/')
            ->assertStatus(200)
            ->assertSee('No hay etiquetas');
            // ->assertSee == se utiliza para visualizar un texto en pantalla
    }

    public function testWithData()
    {
        $tag = Tag::factory()->create();

        $this->assertNotEmpty($tag->name);
        // $this->assertNotEmpty == sirve para evisar que el name del tag no sea vacío

        $this
            ->get('/')
            ->assertStatus(200)
            ->assertSee($tag->name)
            ->assertDontSee('No hay etiquetas');
            // ->assertDontSee == se utiliza para visualizar que no existe ese texto en la pantalla
    }
}
