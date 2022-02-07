<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Box
 * @package App\Models
 *
 * @property string $id
 * @property string $name
 * @property string $identifier
 * @property string $color
 */
class Box extends Model
{
    use HasFactory;

    /**
     * @return HasMany
     */
    public function sets(): HasMany
    {
        return $this->hasMany(Set::class);
    }
}
