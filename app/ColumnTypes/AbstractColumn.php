<?php

namespace Spaceport\ColumnTypes;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use Spaceport\Column;

abstract class AbstractColumn
{
    public function create(Column $column)
    {
        if ($this->exists($column)) {
            return false;
        }

        $self = $this;
        Schema::table($column->liste->getSqlTableName(), function ($table) use ($self, $column) {
            $self->createWithBlueprint($table, $column);
        });
    }

    public function createWithBlueprint(Blueprint $table, Column $column)
    {
    }

    public function exists(Column $column)
    {
        return Schema::hasColumn($column->liste->getSqlTableName(), $column->getSqlColumnName());
    }

    public function validate(Column $column, $input)
    {
        $rules = [];

        if ($column->is_required) {
            $rules[] = 'required';
        }

        return $rules;
    }

    public function drop(Column $column)
    {
        if (! $this->exists($column)) {
            return false;
        }

        $self = $this;
        Schema::table($column->liste->getSqlTableName, function ($table) use ($self, $column) {
            $self->dropWithBlueprint($table, $column);
        });
    }

    public function dropWithBlueprint(Blueprint $table, Column $column)
    {
        $table->dropColumn($column->getSqlColumnName);
    }
}
