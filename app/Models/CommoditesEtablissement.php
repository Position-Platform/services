<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CommoditesEtablissement
 *
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $idEtablissement
 * @property int $idCommodite
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement whereIdCommodite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement whereIdEtablissement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement whereUpdatedAt($value)
 */
class CommoditesEtablissement extends Model
{
    use HasFactory;

    protected $fillable = [
        "idCommodite", "idEtablissement"
    ];
}
