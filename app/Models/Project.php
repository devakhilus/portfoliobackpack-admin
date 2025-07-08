<?php

namespace App\Models;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Project extends Model
{
    use CrudTrait;

    protected $fillable = [
        'title',
        'description',
        'demo_url',
        'github_url',
    ];
    public function getDemoUrlLink()
    {
        return $this->demo_url
            ? '<a href="' . $this->demo_url . '" target="_blank">Live Demo</a>'
            : '-';
    }

    public function getGithubUrlLink()
    {
        return $this->github_url
            ? '<a href="' . $this->github_url . '" target="_blank">GitHub</a>'
            : '-';
    }
}
