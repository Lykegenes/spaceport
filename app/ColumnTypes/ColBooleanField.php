<?php

namespace Spaceport\ColumnTypes;

use Illuminate\Database\Schema\Blueprint;
use Spaceport\Column;

class ColBooleanField extends AbstractColumn
{
    public function createWithBlueprint(Blueprint $table)
    {
        $table->boolean($this->column->getSqlColumnName())->nullable();
    }

    protected function buildOwnRules()
    {
        $rules = ['boolean'];

        return $rules;
    }
}
