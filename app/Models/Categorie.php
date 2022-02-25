<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
 */
class Categorie extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        "id", "nom", "logourl"
    ];

    public function sousCategories()
    {
        return $this->hasMany(SousCategorie::class, "idcategorie");
    }
}
