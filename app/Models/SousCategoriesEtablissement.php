<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SousCategoriesEtablissement
 *
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $etablissement_id
 * @property int $idSousCategorie
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement whereetablissement_id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement whereIdSousCategorie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement whereUpdatedAt($value)
 */
class SousCategoriesEtablissement extends Model
{
    use HasFactory;

    protected $fillable = [
        "sous_categorie_id", "etablissement_id"
    ];
}
