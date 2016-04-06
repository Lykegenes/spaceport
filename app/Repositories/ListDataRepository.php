<?php

namespace Spaceport\Repositories;

use DB;
use Validator;
use Spaceport\Liste;
use Spaceport\ColumnTypes\ColumnTypesFactory;

class ListDataRepository
{
    public static function all(Liste $liste)
    {
        return DB::table($liste->getSqlTableName())->get();
    }

    public static function row(Liste $liste, $rowId)
    {
        return DB::table($liste->getSqlTableName())->where('id', '=', $rowId)->first();
    }

    public static function validate(Liste $liste)
    {
        $columns = $liste->columns;

        $rules = self::getValidationRules($liste);
        //dd($rules);

        $input = [
            'text area' => 'something',
            'integer' => 10,
            'date' => '03/30/2016',
        ];

        $validator = Validator::make($input, $rules);
        dd($validator->errors()->all());
    }

    private static function getValidationRules(Liste $liste)
    {
        $columns = $liste->columns;
        $rules = [];

        foreach($columns as $column) {
            $rules = array_merge($rules, ColumnTypesFactory::make($column)->compileRules());
        }

        return $rules;
    }
}
