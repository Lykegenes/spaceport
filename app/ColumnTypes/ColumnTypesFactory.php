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

            case self::COL_TEXT_AREA:
                return new ColTextArea;

            case self::COL_INTEGER:
                return new ColIntegerField;

            case self::COL_DATE:
                return new ColDateField;

            case self::COL_RADIO:
            case self::COL_CHECKBOX:
                return new ColTextField;

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
