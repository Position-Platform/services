<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Horaire
 *
 * @property int $id
 * @property int $idEtablissement
 * @property string $jour
 * @property string $plageHoraire
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Etablissement|null $etablissement
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire newQuery()
 * @method static \Illuminate\Database\Query\Builder|Horaire onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire query()
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire whereIdEtablissement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire whereJour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire wherePlageHoraire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Horaire withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Horaire withoutTrashed()
 * @mixin \Eloquent
 */
class Horaire extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "idEtablissement", "jour", "plageHoraire"
    ];



    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class, "idEtablissement");
    }
}
