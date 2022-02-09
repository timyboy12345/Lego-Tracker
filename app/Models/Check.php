<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Check
 * @package App\Models
 *
 * @property number $set_id
 * @property Set $set
 * @property string $comments
 * @property string $type
 */
class Check extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'comments',
    ];

    /**
     * @return BelongsTo
     */
    public function set(): BelongsTo
    {
        return $this->belongsTo(Set::class);
    }
}
