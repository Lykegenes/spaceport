<?php

use Illuminate\Database\Seeder;
use Spaceport\Liste;
use Spaceport\ColumnTypes\ColumnTypesConstants;

class ListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $liste = Liste::create([
            'title' => 'List with all column types',
        ]);

        $liste->columns()->create([
            'title' => 'Text Field',
            'type' => ColumnTypesConstants::COL_TEXT_FIELD,
        ]);
    }
}
