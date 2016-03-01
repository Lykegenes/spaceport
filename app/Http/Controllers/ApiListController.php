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

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:123',
        ]);

        $list = ListRepository::create($request->all());

        return $list->toJson();
    }
}
