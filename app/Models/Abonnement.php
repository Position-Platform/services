<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * App\Models\Abonnement
 *
 * @property int $id
 * @property string $nom
 * @property int $prix
 * @property string $type
 * @property int $duree
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Abonnement[] $managers
 * @property-read int|null $managers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement newQuery()
 * @method static \Illuminate\Database\Query\Builder|Abonnement onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereDuree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement wherePrix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Abonnement withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Abonnement withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Paiement[] $paiements
 * @property-read int|null $paiements_count
 */
class Abonnement extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prix', 'type', 'duree'
    ];

    public function managers()
    {
        return $this->hasMany(Abonnement::class, "idAbonnement");
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class, "idAbonnement");
    }
}
