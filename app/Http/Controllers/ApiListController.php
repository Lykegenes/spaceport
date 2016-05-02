<?php

namespace Spaceport\Http\Controllers;

use Spaceport\Http\Requests\CreateListRequest;
use Spaceport\Http\Requests\UpdateListRequest;
use Spaceport\Http\Requests\CreateColumnRequest;
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

    public function create(CreateListRequest $request)
    {
        $list = ListRepository::create($request->getCleanData());

        return $list->toJson();
    }

    public function update(UpdateListRequest $request, $listId)
    {
        $list = ListRepository::update($listId, $request->getCleanData());

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

    public function addColumn(CreateColumnRequest $request, $listId)
    {
        $list = ListRepository::getById($listId);

        $column = ListRepository::addColumn($list, $request->getCleanData());

        return $column->toJson();
    }
}
