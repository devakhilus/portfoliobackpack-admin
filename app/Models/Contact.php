<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Contact extends Model
{
    use CrudTrait;

    protected $fillable = [
        'type',
        'label',
        'value',
        'url',
        'icon', // ✅ newly added
    ];
}
