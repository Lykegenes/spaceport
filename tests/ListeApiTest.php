<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListeApiTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function testBasicExample()
    {
        $this->json('GET', '/api/lists')
            ->assertResponseOK()
            ->seeJsonEquals([]);
    }

    /** @test */
    public function it_creates_a_new_list()
    {
        $this->json('POST', '/api/lists/create', [
                'title' => 'test',
            ])
            ->seeJson([
                'title' => 'test',
            ]);
    }

    /** @test */
    public function it_returns_a_list_by_id()
    {
        /*$liste = factory(Spaceport\Liste::class)->create();

        $this->json('GET', '/api/lists/'.$liste->id)
            ->seeJson([
                'title' => 'test',
            ]);*/
    }
}
