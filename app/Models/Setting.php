<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Setting extends Model
{
    use CrudTrait;

    protected $fillable = ['key', 'value', 'type'];
    public $timestamps = false;

    public static function get($key, $default = null)
    {
        return static::where('key', $key)->value('value') ?? $default;
    }
}
