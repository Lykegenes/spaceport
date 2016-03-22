<?php

namespace Spaceport\Http\Controllers;

use Spaceport\Repositories\ListDataRepository;
use Spaceport\Repositories\ListRepository;

class ApiListDataController extends Controller
{
    public function getListData($listId)
    {
        $list = ListRepository::getById($listId);

        $listData = ListDataRepository::all($list);

        return response()->json($listData);
    }

    public function getRowData($listId, $rowId)
    {
        $list = ListRepository::getById($listId);

        $rowData = ListDataRepository::row($list, $rowId);

        return response()->json($rowData);
    }
}
