<?php

namespace Spaceport\ColumnTypes;

use Illuminate\Database\Schema\Blueprint;
use Spaceport\Column;

class ColTextField extends AbstractColumn
{
    public function makeCreateBlueprint(Blueprint $table, Column $column)
    {
        $table->string($column->getSqlColumnName(), 255)->nullable();
    }

    public function validate(Column $column, $input)
    {
        parent::validate($column, $input);
    }
}
