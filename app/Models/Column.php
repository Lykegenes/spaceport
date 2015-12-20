<?php

namespace Spaceport\Models;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'columns';

    public function listes()
    {
        return $this->belongsToMany(Liste);
    }
}
