<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Career extends Model
{
    use CrudTrait;

    protected $fillable = [
        'job_title',
        'company',
        'description',
        'duration',
    ];
}
