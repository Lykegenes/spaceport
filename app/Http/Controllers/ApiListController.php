<?php

namespace Spaceport\Http\Controllers;

use Illuminate\Http\Request;
use Spaceport\Repositories\ListRepository;

class ApiListController extends Controller
{
    public function all()
    {
        return ListRepository::all()->toJson();
    }

    public function get($listId)
    {
        return ListRepository::getById($listId)->toJson();
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
        ]);

        $list = ListRepository::create($request->all());

        return $list->toJson();
    }

    public function update(Request $request, $listId)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
        ]);

        $list = ListRepository::update($listId, $request->all());

        return $list->toJson();
    }

    public function delete($listId)
    {
        ListRepository::delete($listId);
    }

    public function getColumns($listId)
    {
        $list = ListRepository::getById($listId);

        return $list->columns->toJson();
    }

    public function addColumn(Request $request, $listId)
    {
        $list = ListRepository::getById($listId);

        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'type' => 'required',
        ]);

        $column = ListRepository::addColumn($list, $request->all());

        return $column->toJson();
    }

    public function getListData($listId)
    {
        $list = ListRepository::getById($listId);

        $listData = \Spaceport\Repositories\ListDataRepository::all($list);

        return response()->json($listData);
    }

    public function getRowData($listId, $rowId)
    {
        $list = ListRepository::getById($listId);

        $rowData = \Spaceport\Repositories\ListDataRepository::row($list, $rowId);

        return response()->json($rowData);
    }
}
