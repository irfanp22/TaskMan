<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'status';
    public function task(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
