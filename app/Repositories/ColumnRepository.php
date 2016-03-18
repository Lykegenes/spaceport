<?php

namespace Spaceport\Repositories;

use Spaceport\Column;

class ColumnRepository
{
    public static function getById($id)
    {
        return Column::findOrFail($id);
    }

    public static function getByListId($id)
    {
        return Column::where('list_id', '=', $id)->get();
    }

    public static function update($id, array $data)
    {
        $column = self::getById($id);

        $column->fill([
            'title' => $data['title'],
            'type' => $data['type'],
        ])->save();

        return $column;
    }

    public static function delete($id)
    {
        $column = self::getById($id);

        return $column->delete();
    }
}
