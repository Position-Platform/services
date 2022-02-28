<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * App\Models\Manager
 *
 * @property int $id
 * @property int $idUser
 * @property int $idAbonnement
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Abonnement|null $abonnement
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Manager newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Manager newQuery()
 * @method static \Illuminate\Database\Query\Builder|Manager onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Manager query()
 * @method static \Illuminate\Database\Eloquent\Builder|Manager whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Manager whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Manager whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Manager whereIdAbonnement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Manager whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Manager whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Manager withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Manager withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Paiement[] $paiements
 * @property-read int|null $paiements_count
 */
class Manager extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idUser',
        'idAbonnement'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "idUser");
    }

    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class, "idAbonnement");
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class, "idManager");
    }
}
