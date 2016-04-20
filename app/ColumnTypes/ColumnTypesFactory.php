<?php

namespace Spaceport\ColumnTypes;

use Spaceport\Column;

class ColumnTypesFactory implements ColumnTypesConstants
{
    /**
     * Make an instance of AbstractColumn from a specific type.
     *
     * @param Saceport\Column $column A Column Model
     *
     * @return Spaceport\ColumnTypes\AbstractColumn An instance of AbstractColumn
     */
    public static function make(Column $column)
    {
        switch ($column->type) {
            case self::COL_ID:
                break;

            case self::COL_TITLE:
            case self::COL_TEXT_FIELD:
                return new ColTextField($column);

            case self::COL_TEXT_AREA:
                return new ColTextArea($column);

            case self::COL_INTEGER:
                return new ColIntegerField($column);

            case self::COL_BOOLEAN:
                return new ColBooleanField($column);

            case self::COL_DATE:
                return new ColDateField($column);

            case self::COL_RADIO:
            case self::COL_CHECKBOX:
            case self::COL_SELECT:
                return new ColChoiceSingle($column);

            case self::COL_CREATED_AT:
            case self::COL_UPDATED_AT:
            case self::COL_DELETED_AT:
                break;

            case self::COL_CREATED_BY:
            case self::COL_UPDATED_BY:
            case self::COL_DELETED_BY:
                break;
            default:
                throw new \Exception('Spaceport Fatal Error: Unsupported column type.');
        }
    }
}
