<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Tracking
 *
 * @property int $id
 * @property int $idUser
 * @property string $longitude
 * @property string $latitude
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking newQuery()
 * @method static \Illuminate\Database\Query\Builder|Tracking onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Tracking withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Tracking withoutTrashed()
 * @mixin \Eloquent
 */
class Tracking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "user_id", "longitude", "latitude"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
