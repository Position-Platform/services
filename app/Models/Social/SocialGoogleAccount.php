<?php

namespace App\Models\Social;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Social\SocialGoogleAccount
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider_user_id
 * @property string $provider
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount newQuery()
 * @method static \Illuminate\Database\Query\Builder|SocialGoogleAccount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount whereProviderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|SocialGoogleAccount withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SocialGoogleAccount withoutTrashed()
 * @property-read User|null $user
 * @mixin \Eloquent
 */
class SocialGoogleAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'provider_user_id', 'provider'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
