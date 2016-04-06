<?php

namespace Spaceport\ColumnTypes;

use Illuminate\Database\Schema\Blueprint;
use Spaceport\Column;

class ColTextArea extends AbstractColumn
{
    public function createWithBlueprint(Blueprint $table)
    {
        $table->text($this->column->getSqlColumnName())->nullable();
    }
}
