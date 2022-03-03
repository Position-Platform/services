<?php

namespace App\Models\Social;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Social\SocialTwitterAccount
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider_user_id
 * @property string $provider
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount newQuery()
 * @method static \Illuminate\Database\Query\Builder|SocialTwitterAccount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount whereProviderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|SocialTwitterAccount withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SocialTwitterAccount withoutTrashed()
 * @mixin \Eloquent
 * @property-read User|null $user
 */
class SocialTwitterAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'provider_user_id', 'provider'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
