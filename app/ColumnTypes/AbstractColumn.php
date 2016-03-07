<?php

namespace Spaceport\ColumnTypes;

abstract class AbstractColumn
{
    const NAME = 'Abstract Column';

    const VUE_TAG = 'text-field';

    const SQL_TYPE = 'TEXT';

    public function create()
    {
    }

    public function validate($input)
    {
    }
}
