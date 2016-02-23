<?php

namespace Spacepor\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'items';

    public function liste()
    {
        return $this->hasOne('liste');
    }

    public function columns()
    {
        return $this->hasManyThrough('column', 'liste');
    }
}
