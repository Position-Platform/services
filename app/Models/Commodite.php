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
 * @property int $type_commodite_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Etablissement[] $etablissements
 * @property-read int|null $etablissements_count
 * @property-read \App\Models\TypeCommodite|null $typeCommodite
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite newQuery()
 * @method static \Illuminate\Database\Query\Builder|Commodite onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite whereTypeCommoditeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commodite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Commodite withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Commodite withoutTrashed()
 * @mixin \Eloquent
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
