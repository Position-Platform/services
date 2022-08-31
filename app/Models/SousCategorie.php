<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * App\Models\SousCategorie
 *
 * @property int $id
 * @property string $nom
 * @property int $idcategorie
 * @property string|null $logoUrl
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Categorie|null $categorie
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie newQuery()
 * @method static \Illuminate\Database\Query\Builder|SousCategorie onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie query()
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereidcategorie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereLogoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|SousCategorie withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SousCategorie withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $logourl
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereLogourl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereIdcategorie($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Etablissement[] $etablissements
 * @property-read int|null $etablissements_count
 */
class SousCategorie extends Model
{
    use HasFactory, SoftDeletes, Searchable;


    protected $fillable = [
        "id", "nom", "categorie_id", "logourl", "logourlmap"
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function etablissements()
    {
        return $this->belongsToMany(Etablissement::class, "sous_categories_etablissements", "sous_categorie_id", "etablissement_id");
    }
}
