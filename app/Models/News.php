<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property string $header
 * @property string $text
*/
class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'header',
        'text'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
