<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class About extends Model
{
    use CrudTrait;

    protected $fillable = ['description'];
}
