<?php

namespace Spaceport\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    abstract public function getCleanData();
}
