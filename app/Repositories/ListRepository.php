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

    public static function update($id, $data = [])
    {
        $list = self::getById($id);

        $list->fill([
            'name' => $data['name'],
        ])->save();

        return $list;
    }

    public static function delete($id)
    {
        $list = self::getById($id);

        return $list->delete();
    }
}
