<?php

namespace Spaceport;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    protected $table = 'columns';

    protected $fillable = ['title'];

    public function column()
    {
        return $this->belongsTo(Liste::class, 'list_id', 'id');
    }
}
