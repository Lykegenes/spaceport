<?php

namespace Spaceport\Http\Controllers;

use Illuminate\Http\Request;
use Spaceport\Repositories\UserRepository;

class ApiUserController extends Controller
{
    public function all()
    {
        return UserRepository::all()->toJson();
    }

    public function get($userId)
    {
        return UserRepository::getById($userId)->toJson();
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
        ]);

        $list = UserRepository::create($request->all());

        return $list->toJson();
    }

    public function update(Request $request, $userId)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
        ]);

        $list = UserRepository::update($userId, $request->all());

        return $list->toJson();
    }

    public function delete($userId)
    {
        UserRepository::delete($userId);
    }
}
