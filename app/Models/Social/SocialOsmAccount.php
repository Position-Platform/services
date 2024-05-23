<?php

namespace App\Models\Social;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider_user_id
 * @property string $provider
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|SocialOsmAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialOsmAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialOsmAccount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialOsmAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialOsmAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialOsmAccount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialOsmAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialOsmAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialOsmAccount whereProviderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialOsmAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialOsmAccount whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialOsmAccount withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialOsmAccount withoutTrashed()
 * @mixin \Eloquent
 */
class SocialOsmAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'provider_user_id', 'provider'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
