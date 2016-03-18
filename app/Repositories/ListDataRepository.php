<?php

namespace Spaceport\Repositories;

use DB;
use Spaceport\Liste;

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
}
