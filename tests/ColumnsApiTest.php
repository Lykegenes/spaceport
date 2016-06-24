<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ColumnApiTest extends TestCase
{
    use DatabaseMigrations;

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
}
