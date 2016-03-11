<?php

namespace Spaceport\Http\Controllers;

use Illuminate\Http\Request;
use Spaceport\ColumnTypes\ColumnTypesConstants;
use Spaceport\Repositories\ColumnRepository;

class ApiColumnController extends Controller
{
    public function get($id)
    {
        return ColumnRepository::getById($id);
    }

    public function getColumnTypes()
    {
        return [
            ['text' => 'Text Field', 'value' => ColumnTypesConstants::COL_TEXT_FIELD],
        ];
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
        ]);

        $column = ColumnRepository::update($id, $request->all());

        return $column->toJson();
    }

    public function delete($id)
    {
        ColumnRepository::delete($id);

        return;
    }
}
