<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * App\Models\Batiment
 *
 * @property int $id
 * @property string|null $nom
 * @property string $nombreNiveau
 * @property string $codeBatiment
 * @property string $longitude
 * @property string $latitude
 * @property string|null $image
 * @property string|null $indication
 * @property string|null $rue
 * @property string $ville
 * @property string $commune
 * @property string $quartier
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Etablissement[] $etablissements
 * @property-read int|null $etablissements_count
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment newQuery()
 * @method static \Illuminate\Database\Query\Builder|Batiment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereCodeBatiment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereCommune($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereIndication($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereNombreNiveau($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereQuartier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereRue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereVille($value)
 * @method static \Illuminate\Database\Query\Builder|Batiment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Batiment withoutTrashed()
 * @mixin \Eloquent
 * @property int $idCommercial
 * @property-read \App\Models\Commercial|null $commercial
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereIdCommercial($value)
 * @property int|null $idUser
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereIdUser($value)
 */
class Batiment extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = [
        "idCommercial", "idUser", "nom", "nombreNiveau", "codeBatiment", "longitude", "latitude", "image", "indication", "rue", "ville", "commune", "quartier"
    ];

    public function etablissements()
    {
        return $this->hasMany(Etablissement::class, "idBatiment");
    }

    public function commercial()
    {
        return $this->belongsTo(Commercial::class, "idCommercial");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "idUser");
    }
}
