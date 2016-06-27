<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ColumnApiTest extends TestCase
{
    use DatabaseMigrations;

    protected $liste;

    public function setUp()
    {
        parent::setUp();

        $this->liste = factory(Spaceport\Liste::class)->make();
        $this->liste->save();
    }

    /** @test */
    public function it_returns_column_types()
    {
        $this->json('GET', '/api/columns/types')
            ->seeJsonStructure([
                '*' => [
                    'label', 'value'
                ],
            ])
            ->seeJSON([
                'label' => 'Text Field',
                'value' => 300,
            ]);
    }

    /** @test */
    public function it_creates_a_new_column()
    {
        $this->json('POST', '/api/lists/'.$this->liste->id.'/columns/create', [
                'title' => 'new column title',
                'type' => 300,
            ])
            ->seeJson([
                'title' => 'new column title',
                'type' => 300,
            ]);

        $this->seeInDatabase('columns', [
            'title' => 'new column title',
            'type' => 300,
            'list_id' => $this->liste->id,
        ]);
    }

    /** @test */
    public function it_returns_a_column_by_id()
    {
        $column = new Spaceport\Column(['title' => 'title', 'type' => 300]);
        $this->liste->columns()->save($column);

        $this->json('GET', '/api/columns/'.$column->id)
            ->seeJson([
                'title' => 'title',
            ]);
    }

    /** @test */
    public function it_updates_a_column_by_id()
    {
        $column = new Spaceport\Column(['title' => 'title', 'type' => 300]);
        $this->liste->columns()->save($column);

        $this->json('PUT', '/api/columns/'.$column->id, [
                'title' => 'a modified title',
                'type' => 301.
            ])
            ->seeJson([
                'title' => 'a modified title',
            ])
            ->seeInDatabase('columns', ['title' => 'a modified title']);
    }

    public function it_deletes_a_column_by_id()
    {
        $column = new Spaceport\Column(['title' => 'to delete', 'type' => 300]);
        $this->liste->columns()->save($column);

        $this->seeInDatabase('columns', ['title' => 'to delete']);
        $this->json('DELETE', '/api/columns/'.$column->id);
        $this->dontSeeInDatabase('columns', ['title' => 'to delete']);
    }
}
