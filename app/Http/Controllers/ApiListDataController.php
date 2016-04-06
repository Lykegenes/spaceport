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

    public function getItemData($listId, $itemId)
    {
        $list = ListRepository::getById($listId);

        $itemData = ListDataRepository::row($list, $itemId);

        return response()->json($itemData);
    }

    public function validateData($listId)
    {
        $list = ListRepository::getById($listId);

        ListDataRepository::validate($list);
    }
}
