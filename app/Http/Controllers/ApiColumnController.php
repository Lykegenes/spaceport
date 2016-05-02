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
            ['label' => 'Text Field', 'value' => ColumnTypesConstants::COL_TEXT_FIELD],
            ['label' => 'Text Area', 'value' => ColumnTypesConstants::COL_TEXT_AREA],
            ['label' => 'Integer', 'value' => ColumnTypesConstants::COL_INTEGER],
            ['label' => 'Date', 'value' => ColumnTypesConstants::COL_DATE],
            ['label' => 'Radio', 'value' => ColumnTypesConstants::COL_RADIO],
            ['label' => 'Checkbox', 'value' => ColumnTypesConstants::COL_CHECKBOX],
            ['label' => 'Select', 'value' => ColumnTypesConstants::COL_SELECT],
        ];
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'type' => 'required',
        ]);

        $column = ColumnRepository::update($id, $request->all());

        return $column->toJson();
    }

    public function delete($id)
    {
        ColumnRepository::delete($id);
    }
}
