<?php

namespace Spaceport\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;
use Schema;
use Spaceport\Liste;

class ListeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Liste::creating(function ($liste) {
            $this->createListeTable($liste);
        });

        Liste::deleting(function ($liste) {
            $this->dropListeTable($liste);
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

    protected function createListeTable(Liste $liste)
    {
        $tableName = $liste->getSqlTableName();
        // Check if the table already exists
        if (Schema::hasTable($tableName)) {
            return false;
        }

        Schema::create($tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        // The table should now exist.
        return Schema::hasTable($tableName);
    }

    protected function dropListeTable(Liste $liste)
    {
        $tableName = $liste->getSqlTableName();

        Schema::dropIfExists($tableName);

        // The table shouldn't exist anymore.
        return !Schema::hasTable($tableName);
    }
}
