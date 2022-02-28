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
 * @property string $idBatiment
 * @property string $indicationAdresse
 * @property string $codePostal
 * @property string $siteInternet
 * @property string $idCommercial
 * @property string|null $idManager
 * @property string $etage
 * @property string $cover
 * @property string $vues
 * @property string $phone
 * @property string $whatsapp1
 * @property string|null $whatsapp2
 * @property string|null $description
 * @property string|null $osmId
 * @property bool $updated
 * @property string $revoir
 * @property string $valide
 * @property string $services
 * @property string|null $ameliorations
 * @property int $avis
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Batiment|null $batiment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commentaire[] $commentaires
 * @property-read int|null $commentaires_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Horaire[] $horaires
 * @property-read int|null $horaires_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement newQuery()
 * @method static \Illuminate\Database\Query\Builder|Etablissement onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereAmeliorations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereAvis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereCodePostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereEtage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereIdBatiment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereIdCommercial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereIdManager($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereIndicationAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereOsmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereRevoir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereServices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereSiteInternet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereUpdated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereValide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereVues($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereWhatsapp1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereWhatsapp2($value)
 * @method static \Illuminate\Database\Query\Builder|Etablissement withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Etablissement withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commodite[] $commodites
 * @property-read int|null $commodites_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SousCategorie[] $sousCategories
 * @property-read int|null $sous_categories_count
 */
class Etablissement extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = [
        "nom", "idBatiment", "indicationAdresse", "codePostal", "siteInternet", "idCommercial", "idManager", "etage", "cover", "vues", "phone", "whatsapp1", "whatsapp2", "description", "osmId", "updated", "revoir", "valide", "services", "ameliorations", "avis"
    ];

    public function batiment()
    {
        return $this->belongsTo(Batiment::class, "idBatiment");
    }

    public function images()
    {
        return $this->hasMany(Image::class, "idEtablissement");
    }

    public function horaires()
    {
        return $this->hasMany(Horaire::class, "idEtablissement");
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, "idEtablissement");
    }

    public function sousCategories()
    {
        return $this->belongsToMany(SousCategorie::class, "sous_categories_etablissements",  "idEtablissement", "idSousCategorie");
    }

    public function commodites()
    {
        return $this->belongsToMany(Commodite::class, "commodites_etablissements",  "idEtablissement", "idCommodite");
    }
}
