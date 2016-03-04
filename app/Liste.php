<?php

namespace Spaceport;

use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
    protected $table = 'lists';

    protected $fillable = ['title'];

    public function columns()
    {
        return $this->hasMany(Column::class, 'list_id', 'id');
    }
}
