<?php

namespace Spaceport\ColumnTypes;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use Spaceport\Column;

abstract class AbstractColumn
{
    /**
     * A Column model instance.
     * @var Spaceport\Column
     */
    protected $column;

    public function __construct(Column $column)
    {
        $this->column = $column;
    }
    /**
     * Create a new Column in the database.
     * @return bool   True if the operation was successful
     */
    public function create()
    {
        $column = $this->column;

        if ($this->exists($column)) {
            return false;
        }

        $self = $this;
        Schema::table($column->liste->getSqlTableName(), function ($table) use ($self) {
            $self->createWithBlueprint($table);
        });

        return $this->exists($column);
    }

    /**
     * Create a Column from the database using the specified Blueprint.
     * @param Blueprint $table  A Blueprint instance
     */
    abstract public function createWithBlueprint(Blueprint $table);

    /**
     * Checks if a Column exists in the database.
     * @return bool   True if the tables exists
     */
    public function exists()
    {
        $column = $this->column;

        return Schema::hasColumn($column->liste->getSqlTableName(), $column->getSqlColumnName());
    }

    /**
     * The common validation rules for this Column Instance.
     * @return array  An array of validation rules
     */
    private function buildCommonRules()
    {
        $rules = [];

        if ($this->column->is_required) {
            $rules[] = 'required';
        }

        return $rules;
    }

    /**
     * The specific validation rules for this type of column.
     * @return array  An array of validation rules
     */
    protected function buildOwnRules()
    {
        // Has to be implemented by each specific column type.
        return [];
    }

    /**
     * The complete validation rules for this column, formatted for Laravel's Validator.
     * @return array  An array of validation rules, formatted for Laravel's Validator
     */
    public function compileRules()
    {
        $rules = array_merge($this->buildCommonRules(), $this->buildOwnRules());

        return [ $this->column->title => implode('|', $rules) ];
    }

    /**
     * Drop a Column in the database.
     * @param  Column $column A Column instance
     * @return bool   True if the operation was successful
     */
    public function drop()
    {
        $column = $this->column;

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
    public function dropWithBlueprint(Blueprint $table)
    {
        $table->dropColumn($this->column->getSqlColumnName());
    }
}
