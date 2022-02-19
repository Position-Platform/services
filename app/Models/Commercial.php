<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Commercial
 *
 * @property int $id
 * @property int $idUser
 * @property int $numeroCni
 * @property int $numeroBadge
 * @property string $ville
 * @property string $quartier
 * @property bool $actif
 * @property string $sexe
 * @property int $whatsapp
 * @property string $diplome
 * @property string $tailleTshirt
 * @property int $age
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial newQuery()
 * @method static \Illuminate\Database\Query\Builder|Commercial onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial whereActif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial whereDiplome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial whereNumeroBadge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial whereNumeroCni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial whereQuartier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial whereSexe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial whereTailleTshirt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial whereVille($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commercial whereWhatsapp($value)
 * @method static \Illuminate\Database\Query\Builder|Commercial withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Commercial withoutTrashed()
 * @mixin \Eloquent
 */
class Commercial extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idUser',
        'numeroCni',
        'numeroBadge',
        'ville',
        'quartier', 'actif', 'sexe', 'whatsapp', 'diplome', 'tailleTshirt', 'age'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "idUser");
    }
}