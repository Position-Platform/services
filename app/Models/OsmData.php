<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property int $id
 * @property string $sous_categorie_id
 * @property string $osm_id
 * @property string $name
 * @property string $lon
 * @property string $lat
 * @property string|null $opening_hours
 * @property string|null $phone
 * @property string|null $website
 * @property string|null $code_postal
 * @property string|null $city
 * @property string|null $quartier
 * @property string|null $rue
 * @property string|null $image
 * @property string|null $description
 * @property string|null $services
 * @property string|null $commodites
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SousCategorie|null $souscategorie
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData query()
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereCodePostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereCommodites($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereOpeningHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereOsmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereQuartier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereRue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereServices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereSousCategorieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OsmData withoutTrashed()
 * @mixin \Eloquent
 */
class OsmData extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'osm_data';

    protected $fillable = [
        'sous_categorie_id',
        'osm_id',
        'name',
        'lon',
        'lat',
        'opening_hours',
        'phone',
        'website',
        'code_postal',
        'city',
        'quartier',
        'rue',
        'image',
        'description',
        'services',
        'commodites',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function souscategorie()
    {
        return $this->belongsTo(Souscategorie::class);
    }
}
