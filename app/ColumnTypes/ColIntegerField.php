<?php

namespace Spaceport\ColumnTypes;

use Illuminate\Database\Schema\Blueprint;
use Spaceport\Column;

class ColIntegerField extends AbstractColumn
{
    public function createWithBlueprint(Blueprint $table)
    {
        $table->integer($this->column->getSqlColumnName())->nullable();
    }

    protected function buildOwnRules()
    {
        $rules = ['integer'];

        return $rules;
    }
}
