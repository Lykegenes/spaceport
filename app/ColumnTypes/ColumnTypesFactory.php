<?php

namespace Spaceport\ColumnTypes;

class ColumnTypesFactory implements ColumnTypesConstants
{
    /**
     * Make an instance of AbstractColumn from a specific type.
     *
     * @param  int                                  $type A Column Type constant
     * @return Spaceport\ColumnTypes\AbstractColumn An instance of AbstractColumn
     */
    public static function make($type)
    {
        switch ($type) {
            case self::COL_ID:
                break;

            case self::COL_TITLE:
            case self::COL_TEXT_FIELD:
                return new ColTextField;

            case self::COL_CREATED_AT:
            case self::COL_UPDATED_AT:
            case self::COL_DELETED_AT:
                break;

            case self::COL_CREATED_BY:
            case self::COL_UPDATED_BY:
            case self::COL_DELETED_BY:
                break;
        }
    }
}
