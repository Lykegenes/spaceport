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

    public static function create(array $data)
    {
        $list = Liste::create([
            'title' => $data['title'],
        ]);

        return $list;
    }

    public static function update($id, array $data)
    {
        $list = self::getById($id);

        $list->fill([
            'title' => $data['title'],
        ])->save();

        return $list;
    }

    public static function delete($id)
    {
        $list = self::getById($id);

        return $list->delete();
    }

    public static function addColumn($list, array $data)
    {
        $column = $list->columns()->create([
            'title' => $data['title'],
        ]);

        return $column;
    }

    public static function updateColumn($column, array $data)
    {
        $column = $list->columns()->create([
            'title' => $data['title'],
        ]);

        return $column;
    }
}
