<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Paiement
 *
 * @property int $id
 * @property int $idAbonnement
 * @property int $idManager
 * @property int $idCommercial
 * @property string $datePaiement
 * @property string|null $referenceId
 * @property string|null $referencePosition
 * @property string $typePaiement
 * @property string $statut
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Abonnement|null $abonnement
 * @property-read \App\Models\Commercial|null $commercial
 * @property-read \App\Models\Manager|null $manager
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement newQuery()
 * @method static \Illuminate\Database\Query\Builder|Paiement onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereDatePaiement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereIdAbonnement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereIdCommercial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereIdManager($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereReferencePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereStatut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereTypePaiement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Paiement withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Paiement withoutTrashed()
 * @mixin \Eloquent
 */
class Paiement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "idAbonnement", "idManager", "idCommercial", "datePaiement", "referenceId", "referencePosition", "typePaiement", "statut"
    ];

    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class, "idAbonnement");
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class, "idManager");
    }

    public function commercial()
    {
        return $this->belongsTo(Commercial::class, "idCommercial");
    }
}
