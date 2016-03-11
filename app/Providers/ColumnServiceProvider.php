<?php

namespace Spaceport\Providers;

use Illuminate\Support\ServiceProvider;
use Spaceport\Column;
use Spaceport\ColumnTypes\ColumnTypesFactory;

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
            $this->dropListeColumn($column);
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
        $abstractColumnType = ColumnTypesFactory::make($column->type);

        $abstractColumnType->create($column);

        // The column should now exist.
        return $abstractColumnType->exists($column);
    }

    protected function dropListeColumn(Column $column)
    {
        $abstractColumnType = ColumnTypesFactory::make($column->type);

        $abstractColumnType->drop($column);

        // The column shouldn't exist anymore.
        return ! $abstractColumnType->exists($column);
    }
}
