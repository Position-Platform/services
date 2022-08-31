<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * App\Models\Commodite
 *
 * @property int $id
 * @property string $nom
 * @property int $idCategorie
 * @property int $idTypeCommodite
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TypeCommodite|null $typeCommodite
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite newQuery()
 * @method static \Illuminate\Database\Query\Builder|Commodite onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite whereIdCategorie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite whereIdTypeCommodite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Commodite withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Commodite withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Categorie[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Etablissement[] $etablissements
 * @property-read int|null $etablissements_count
 */
class Commodite extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = [
        "nom", "type_commodite_id"
    ];

    public function typeCommodite()
    {
        return $this->belongsTo(TypeCommodite::class);
    }

    public function etablissements()
    {
        return $this->belongsToMany(Etablissement::class, "commodites_etablissements", "commodite_id", "etablissement_id");
    }
}
