<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\UserFavoris
 *
 * @property int $id
 * @property int $user_id
 * @property int $etablissement_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserFavoris onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris whereEtablissementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|UserFavoris withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserFavoris withoutTrashed()
 * @mixin \Eloquent
 */
class UserFavoris extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_favoris';

    protected $fillable = [
        'user_id',
        'etablissement_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at', 'pivot'
    ];
}
