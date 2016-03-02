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

    public function get($id)
    {
        return ListRepository::getById($id)->toJson();
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
        ]);

        $list = ListRepository::create($request->all());

        return $list->toJson();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
        ]);

        $list = ListRepository::update($id, $request->all());

        return $list->toJson();
    }

    public function delete($id)
    {
        ListRepository::delete($id);

        return;
    }
}
