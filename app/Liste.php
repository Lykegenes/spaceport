<?php

namespace Spaceport;

use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
    protected $table = 'lists';

    protected $fillable = ['name'];
}
