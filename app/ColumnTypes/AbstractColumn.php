<?php

namespace Spaceport\ColumnTypes;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use Spaceport\Column;

abstract class AbstractColumn
{
    /**
     * Create a new Column in the database.
     * @param  Column $column A Column instance
     * @return bool   True if the operation was successful
     */
    public function create(Column $column)
    {
        if ($this->exists($column)) {
            return false;
        }

        $self = $this;
        Schema::table($column->liste->getSqlTableName(), function ($table) use ($self, $column) {
            $self->createWithBlueprint($table, $column);
        });

        return $this->exists($column);
    }

    /**
     * Create a Column from the database using the specified Blueprint.
     * @param Blueprint $table  A Blueprint instance
     * @param Column    $column A Column instance
     */
    abstract public function createWithBlueprint(Blueprint $table, Column $column);

    /**
     * Checks if a Column exists in the database.
     * @param  Column $column A Column instance
     * @return bool   True if the tables exists
     */
    public function exists(Column $column)
    {
        return Schema::hasColumn($column->liste->getSqlTableName(), $column->getSqlColumnName());
    }

    /**
     * The validation rules for this Column Instance.
     * @param  Column $column A Column instance
     * @return array  An array of validation rules
     */
    public function validationRules(Column $column)
    {
        $rules = [];

        if ($column->is_required) {
            $rules[] = 'required';
        }

        return $rules;
    }

    /**
     * Validates an input for this Column instance.
     * @param  Column $column A Column instance
     * @param  mixed  $input  The input from the Request
     * @return bool   True if the input passed the validation tests
     */
    public function validate(Column $column, $input)
    {
        return true; // for now
    }

    /**
     * Drop a Column in the database.
     * @param  Column $column A Column instance
     * @return bool   True if the operation was successful
     */
    public function drop(Column $column)
    {
        if (! $this->exists($column)) {
            return false;
        }

        $self = $this;
        Schema::table($column->liste->getSqlTableName(), function ($table) use ($self, $column) {
            $self->dropWithBlueprint($table, $column);
        });

        return ! $this->exists($column);
    }

    /**
     * Drop a Column from the database using the specified Blueprint.
     * @param Blueprint $table  A Blueprint instance
     * @param Column    $column A Column instance
     */
    public function dropWithBlueprint(Blueprint $table, Column $column)
    {
        $table->dropColumn($column->getSqlColumnName());
    }
}
