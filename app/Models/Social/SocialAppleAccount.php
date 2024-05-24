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
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAppleAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAppleAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAppleAccount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAppleAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAppleAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAppleAccount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAppleAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAppleAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAppleAccount whereProviderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAppleAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAppleAccount whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAppleAccount withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialAppleAccount withoutTrashed()
 * @mixin \Eloquent
 */
class SocialAppleAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'provider_user_id', 'provider'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
