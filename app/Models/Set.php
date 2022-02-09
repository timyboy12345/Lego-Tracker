<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Set
 * @package App\Models
 *
 * @property number $id
 * @property string $identifier
 * @property string $name
 * @property string $box_id
 * @property Box $box
 * @property string $image_url
 * @property string $year
 * @property int $parts
 * @property int $theme_id
 */
class Set extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifier',
        'name',
        'parts',
        'image_url',
        'year',
        'theme_id',
    ];

    /**
     * @return BelongsTo
     */
    public function box(): BelongsTo
    {
        return $this->belongsTo(Box::class);
    }

    /**
     * @return HasMany
     */
    public function checks(): HasMany
    {
        return $this->hasMany(Check::class);
    }
}
