<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Commentaire
 *
 * @property int $id
 * @property int $idUser
 * @property int $idEtablissement
 * @property string|null $commentaire
 * @property int|null $rating
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Etablissement|null $etablissement
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire newQuery()
 * @method static \Illuminate\Database\Query\Builder|Commentaire onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereCommentaire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereIdEtablissement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Commentaire withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Commentaire withoutTrashed()
 * @mixin \Eloquent
 */
class Commentaire extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "idUser", "idEtablissement", "commentaire", "rating"
    ];

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class, "idEtablissement");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "idUser");
    }
}
