<?php

namespace Spaceport\Models;

use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'listes';

    public function columns()
    {
        return $this->hasMany(Column);
    }
}
