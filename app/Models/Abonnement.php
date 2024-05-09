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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Paiement[] $paiements
 * @property-read int|null $paiements_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
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
 */
class Abonnement extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prix', 'type', 'duree'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at', 'pivot'
    ];

    public function users()
    {
        return $this->hasMany(User::class, "abonnement_id");
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class, "abonnement_id");
    }
}
