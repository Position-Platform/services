<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;


/**
 * App\Models\Etablissement
 *
 * @property int $id
 * @property string $nom
 * @property int $batiment_id
 * @property string|null $indication_adresse
 * @property string|null $code_postal
 * @property string|null $site_internet
 * @property string|null $nom_manager
 * @property string|null $contact_manager
 * @property int|null $user_id
 * @property int $etage
 * @property string|null $cover
 * @property string $phone
 * @property string $whatsapp1
 * @property string|null $whatsapp2
 * @property string|null $description
 * @property int|null $osm_id
 * @property string $services
 * @property string|null $ameliorations
 * @property int $vues
 * @property string|null $logo
 * @property string|null $logo_map
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Batiment|null $batiment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commentaire[] $commentaires
 * @property-read int|null $commentaires_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commodite[] $commodites
 * @property-read int|null $commodites_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Horaire[] $horaires
 * @property-read int|null $horaires_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SousCategorie[] $sousCategories
 * @property-read int|null $sous_categories_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement newQuery()
 * @method static \Illuminate\Database\Query\Builder|Etablissement onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereAmeliorations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereBatimentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereCodePostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereContactManager($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereEtage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereIndicationAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereLogoMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereNomManager($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereOsmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereServices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereSiteInternet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereVues($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereWhatsapp1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereWhatsapp2($value)
 * @method static \Illuminate\Database\Query\Builder|Etablissement withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Etablissement withoutTrashed()
 * @mixin \Eloquent
 */
class Etablissement extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = [
        "nom", "batiment_id", "indication_adresse", "code_postal", "site_internet", "nom_manager",
        "contact_manager", "user_id", "etage", "cover", "vues", "phone", "whatsapp1", "whatsapp2", "description", "osm_id", "services", "ameliorations", "logo", "logo_map"
    ];

    protected $hidden = [
        'batiment_id',
        'user_id',
        'created_at',
    ];

    public function batiment()
    {
        return $this->belongsTo(Batiment::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, "etablissement_id");
    }

    public function horaires()
    {
        return $this->hasMany(Horaire::class, "etablissement_id");
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, "etablissement_id");
    }

    public function sousCategories()
    {
        return $this->belongsToMany(SousCategorie::class, "sous_categories_etablissements",  "etablissement_id", "sous_categorie_id");
    }

    public function commodites()
    {
        return $this->belongsToMany(Commodite::class, "commodites_etablissements",  "etablissement_id", "commodite_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
