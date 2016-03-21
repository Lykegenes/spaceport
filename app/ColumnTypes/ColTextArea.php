<?php

namespace Spaceport\ColumnTypes;

use Illuminate\Database\Schema\Blueprint;
use Spaceport\Column;

class ColTextArea extends AbstractColumn
{
    public function createWithBlueprint(Blueprint $table, Column $column)
    {
        $table->text($column->getSqlColumnName())->nullable();
    }

    public function validate(Column $column, $input)
    {
        return parent::validate($column, $input);
    }
}
