<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Paiement
 *
 * @property int $id
 * @property int $abonnement_id
 * @property int $user_id
 * @property string $date_paiement
 * @property string|null $reference_id
 * @property string|null $reference_position
 * @property string $type_paiement
 * @property string $statut
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Abonnement|null $abonnement
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement newQuery()
 * @method static \Illuminate\Database\Query\Builder|Paiement onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereAbonnementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereDatePaiement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereReferencePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereStatut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereTypePaiement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Paiement withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Paiement withoutTrashed()
 * @mixin \Eloquent
 */
class Paiement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "abonnement_id", "user_id",  "date_paiement", "reference_id", "reference_position", "type_paiement", "statut"
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at', 'pivot'
    ];

    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
