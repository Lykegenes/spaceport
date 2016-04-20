<?php

namespace Spaceport\ColumnTypes;

use Illuminate\Database\Schema\Blueprint;
use Spaceport\Column;

class ColChoiceSingle extends AbstractColumn
{
    public function createWithBlueprint(Blueprint $table)
    {
        /*
         * Only one element can be selected. The elements will be stored
         * in another table, and only it's ID will be kept here.
         */
        $table->integer($this->column->getSqlColumnName())->nullable();
    }
}
