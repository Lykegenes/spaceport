<?php

namespace Spaceport\ColumnTypes;

use Illuminate\Database\Schema\Blueprint;
use Spaceport\Column;

class ColDateField extends AbstractColumn
{
    public function createWithBlueprint(Blueprint $table)
    {
        $table->datetime($this->column->getSqlColumnName())->nullable();
    }

    protected function buildOwnRules()
    {
        $rules = ['date'];

        return $rules;
    }
}
