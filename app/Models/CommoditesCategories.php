<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CommoditesCategories
 *
 * @property int $id
 * @property int $idCategorie
 * @property int $idComodite
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesCategories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesCategories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesCategories query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesCategories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesCategories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesCategories whereIdCategorie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesCategories whereIdComodite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesCategories whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $idCommodite
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesCategories whereIdCommodite($value)
 */
class CommoditesCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        "idCommodite", "idCategorie"
    ];
}
