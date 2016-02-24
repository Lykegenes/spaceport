<?php

namespace Spaceport\Repositories;

use Spaceport\Models\Liste;

class ListRepository
{
    public function create(array $data)
    {
        $list = Liste::create([
            'name' = $data['name'];
        ]);

        $list->save();

        return $list;
    }

    public function getList($listId)
    {
        return Liste::findOfFail($listId);
    }
}
