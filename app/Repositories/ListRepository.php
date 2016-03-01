<?php

namespace Spaceport\Repositories;

use Spaceport\Liste;

class ListRepository
{
    public static function getById($id)
    {
        return Liste::findOrFail($id);
    }

    public static function all()
    {
        return Liste::all();
    }

    public static function create($data = [])
    {
        $list = Liste::create([
            'name' => $data['name'],
        ]);

        return $list;
    }
}
