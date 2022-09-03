<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\CommoditesEtablissement
 *
 * @property int $id
 * @property int $etablissement_id
 * @property int $commodite_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement whereCommoditeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement whereEtablissementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommoditesEtablissement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CommoditesEtablissement extends Model
{
    use HasFactory;

    protected $fillable = [
        "commodite_id", "etablissement_id"
    ];
}
