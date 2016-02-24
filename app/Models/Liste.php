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

    protected $guarded = ['id'];

    public function columns()
    {
        return $this->hasMany('Spaceport\Models\Column');
    }

    public function items()
    {
        return $this->belongsToMany('Spaceport\Models\Item');
    }
}
