<?php

namespace Spaceport;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    protected $table = 'columns';

    protected $fillable = ['title'];

    /**
     * Get the parent Liste model.
     *
     * @return Spaceport\Liste The parent Liste model.
     */
    public function liste()
    {
        return $this->belongsTo(Liste::class, 'list_id', 'id');
    }

    public function getSqlColumnName()
    {
        return $this->title;
    }
}
