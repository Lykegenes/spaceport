<?php

namespace Spaceport\ColumnTypes;

use Illuminate\Database\Schema\Blueprint;
use Spaceport\Column;

class ColIntegerField extends AbstractColumn
{
    public function createWithBlueprint(Blueprint $table, Column $column)
    {
        $table->integer($column->getSqlColumnName())->nullable();
    }

    public function validate(Column $column, $input)
    {
        return parent::validate($column, $input);
    }
}
