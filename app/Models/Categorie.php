<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * App\Models\Categorie
 *
 * @property int $id
 * @property string $nom
 * @property string|null $logoUrl
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SousCategorie[] $sousCategories
 * @property-read int|null $sous_categories_count
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie newQuery()
 * @method static \Illuminate\Database\Query\Builder|Categorie onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereLogoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Categorie withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Categorie withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $logourl
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereLogourl($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commodite[] $commodites
 * @property-read int|null $commodites_count
 * @property string|null $shortname
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereShortname($value)
 * @property int|null $vues
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereVues($value)
 */
class Categorie extends Model
{
    use HasFactory, SoftDeletes, Searchable;


    protected $fillable = [
        "id", "nom", "shortname", "logourl",
        "logourlmap", "vues"
    ];

    public function sousCategories()
    {
        return $this->hasMany(SousCategorie::class, "categorie_id");
    }

    public function commodites()
    {
        return $this->belongsToMany(Commodite::class, "commodites_categories", "categorie_id", "commodite_id");
    }
}
