<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\TypeCommodite
 *
 * @property int $id
 * @property string $nom
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commodite[] $commodites
 * @property-read int|null $commodites_count
 * @method static \Illuminate\Database\Eloquent\Builder|TypeCommodite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeCommodite newQuery()
 * @method static \Illuminate\Database\Query\Builder|TypeCommodite onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeCommodite query()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeCommodite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeCommodite whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeCommodite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeCommodite whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeCommodite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|TypeCommodite withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TypeCommodite withoutTrashed()
 * @mixin \Eloquent
 */
class TypeCommodite extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "nom"
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function commodites()
    {
        return $this->hasMany(Commodite::class, "type_commodite_id");
    }
}
