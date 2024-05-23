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
 * @property int $categorie_id
 * @property string|null $logourl
 * @property string|null $logourlmap
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Categorie|null $categorie
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Etablissement[] $etablissements
 * @property-read int|null $etablissements_count
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie newQuery()
 * @method static \Illuminate\Database\Query\Builder|SousCategorie onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie query()
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereCategorieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereLogourl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereLogourlmap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|SousCategorie withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SousCategorie withoutTrashed()
 * @property string|null $color
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereColor($value)
 * @mixin \Eloquent
 */
class SousCategorie extends Model
{
    use HasFactory, SoftDeletes, Searchable;


    protected $fillable = [
        "id", "nom", "categorie_id", "logourl", "logourlmap", "color"
    ];

    protected $hidden = [
        'categorie_id',
        'created_at',
        'updated_at',
        'deleted_at', 'pivot'
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
