<?php

namespace Spaceport\Repositories;

use Spaceport\Models\Liste;
use Spaceport\Models\Column;

class ColumnRepository
{
    public function create($list, array $data)
    {
        $column = Column::create([
            'name' = $data['name'];
        ]);

        $column->list_id = $list->id;

        $column->save();

        return $column;
    }

    public function getColumn($list, $columnId)
    {
        return $list->columns()->findOrFail($columnId);
    }
}
