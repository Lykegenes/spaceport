<?php

namespace Spaceport\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use Spaceport\Column;
use Spaceport\Liste;

class ColumnServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Column::creating(function ($column) {
            $this->createListeColumn($column);
        });

        Column::deleting(function ($column) {
            $this->dropListeColumn()($column);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    protected function createListeColumn(Column $column)
    {
        $tableName = $column->liste->getSqlTableName();
        $columnName = $column->getSqlColumnName();

        // Check if the column already exists
        if (Schema::hasColumn($tableName, $columnName)) {
            return false;
        }

        Schema::table($tableName, function ($table) use ($columnName) {
            $table->string($columnName)->nullable();
        });

        // The column should now exist.
        return Schema::hasColumn($tableName, $columnName);
    }

    protected function dropListeColumn(Column $liste)
    {
        $tableName = $column->liste->getSqlTableName();
        $columnName = $column->getSqlColumnName();

        Schema::table($tableName, function ($table) use ($columnName) {
            $table->dropColumn($columnName);
        });

        // The column shouldn't exist anymore.
        return ! Schema::hasColumn($tableName, $columnName);
    }
}
