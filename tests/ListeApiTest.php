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
                'title' => 'new list title',
            ])
            ->seeJson([
                'title' => 'new list title',
            ]);

        $this->seeInDatabase('lists', ['title' => 'new list title']);
    }

    /** @test */
    public function it_creates_a_new_database_table_for_the_list()
    {
        // simple title
        $this->json('POST', '/api/lists/create', [
                'title' => 'title',
            ]);
        $this->assertTrue(Schema::hasTable(Spaceport\Liste::SQL_TABLE_PREFIX . 'title'));

        // title with spaces
        $this->json('POST', '/api/lists/create', [
                'title' => 'title with spaces',
            ]);
        $this->assertTrue(Schema::hasTable(Spaceport\Liste::SQL_TABLE_PREFIX . 'title with spaces'));
    }

    /** @test */
    public function it_returns_a_list_by_id()
    {
        $liste = Spaceport\Liste::create(['title' => 'new list title']);

        $this->json('GET', '/api/lists/'.$liste->id)
            ->seeJson([
                'title' => 'new list title',
            ]);
    }

    /** @test */
    public function it_updates_a_list_by_id()
    {
        $liste = Spaceport\Liste::create(['title' => 'some title']);

        $this->json('PUT', '/api/lists/'.$liste->id, [
                'title' => 'an updated title',
            ])
            ->seeJson([
                'title' => 'an updated title',
            ])
            ->seeInDatabase('lists', ['title' => 'an updated title']);

        // TODO
        //$this->assertTrue(Schema::hasTable(Spaceport\Liste::SQL_TABLE_PREFIX . 'an updated title'));
    }

    /** @test */
    public function it_deletes_a_list_by_id()
    {
        $liste = Spaceport\Liste::create(['title' => 'some title']);

        $this->json('DELETE', '/api/lists/'.$liste->id);
        $this->dontSeeInDatabase('lists', ['title' => 'some title']);
        $this->assertFalse(Schema::hasTable(Spaceport\Liste::SQL_TABLE_PREFIX . 'some title'));
    }
}
