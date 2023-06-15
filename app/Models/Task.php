<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';

    public $timestamps = false;
    protected $fillable = [
        'judul',
        'deskripsi',
        'status_id',
        'user_id'
    ];
    
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
