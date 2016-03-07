<?php

namespace Spaceport;

use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
    const SQL_TABLE_PREFIX = 'list_';

    protected $table = 'lists';

    protected $fillable = ['title'];

    /**
     * Get the child Columns.
     *
     * @return Illuminate\Support\Collection A collection of the child Column models.
     */
    public function columns()
    {
        return $this->hasMany(Column::class, 'list_id', 'id');
    }

    public function getSqlTableName()
    {
        return self::SQL_TABLE_PREFIX.$this->title;
    }
}
