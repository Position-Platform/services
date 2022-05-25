<?php

namespace App\Models\Social;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Social\SocialFacebookAccount
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider_user_id
 * @property string $provider
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount newQuery()
 * @method static \Illuminate\Database\Query\Builder|SocialFacebookAccount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount whereProviderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|SocialFacebookAccount withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SocialFacebookAccount withoutTrashed()
 * @mixin \Eloquent
 * @property-read User|null $user
 */
class SocialFacebookAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'provider_user_id', 'provider'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
