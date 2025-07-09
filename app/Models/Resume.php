<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Resume extends Model
{
    use CrudTrait;

    protected $fillable = ['title', 'file'];

    public function getFileLink()
    {
        if ($this->file && Storage::disk('public')->exists($this->file)) {
            return '<a href="' . Storage::disk('public')->url($this->file) . '" target="_blank">📄 Download</a>';
        }

        return 'No file uploaded.';
    }
}
