<?php

namespace Spaceport\ColumnTypes;

use Illuminate\Database\Schema\Blueprint;
use Spaceport\Column;

class TextFieldColumn extends AbstractColumn
{
    const NAME = 'Text Field';

    const VUE_TAG = 'text-field';

    public function create(Column $column, Blueprint $table)
    {
        $table->string($column->getSqlColumnName(), 255)->nullable();
    }

    public function validate($input)
    {
    }
}
