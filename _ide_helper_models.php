<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Abonnement
 *
 * @property int $id
 * @property string $nom
 * @property int $prix
 * @property string $type
 * @property int $duree
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Paiement[] $paiements
 * @property-read int|null $paiements_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement newQuery()
 * @method static \Illuminate\Database\Query\Builder|Abonnement onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereDuree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement wherePrix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Abonnement withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Abonnement withoutTrashed()
 * @mixin \Eloquent
 */
	class Abonnement extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $id
 * @property bool $isSuperAdmin
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Query\Builder|Admin onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIsSuperAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Admin withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Admin withoutTrashed()
 * @mixin \Eloquent
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Batiment
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $nom
 * @property string $nombre_niveau
 * @property string $code
 * @property string $longitude
 * @property string $latitude
 * @property string|null $image
 * @property string|null $indication
 * @property string|null $rue
 * @property string $ville
 * @property string $commune
 * @property string $quartier
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Etablissement[] $etablissements
 * @property-read int|null $etablissements_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment newQuery()
 * @method static \Illuminate\Database\Query\Builder|Batiment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereCommune($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereIndication($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereNombreNiveau($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereQuartier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereRue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batiment whereVille($value)
 * @method static \Illuminate\Database\Query\Builder|Batiment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Batiment withoutTrashed()
 * @mixin \Eloquent
 */
	class Batiment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Categorie
 *
 * @property int $id
 * @property string $nom
 * @property string $shortname
 * @property string|null $logourl
 * @property string|null $logourlmap
 * @property int $vues
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commodite[] $commodites
 * @property-read int|null $commodites_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SousCategorie[] $sousCategories
 * @property-read int|null $sous_categories_count
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie newQuery()
 * @method static \Illuminate\Database\Query\Builder|Categorie onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereLogourl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereLogourlmap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereShortname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereVues($value)
 * @method static \Illuminate\Database\Query\Builder|Categorie withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Categorie withoutTrashed()
 * @property string|null $color
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereColor($value)
 * @mixin \Eloquent
 */
	class Categorie extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Commentaire
 *
 * @property int $id
 * @property int $user_id
 * @property int $etablissement_id
 * @property string|null $commentaire
 * @property int|null $rating
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Etablissement|null $etablissement
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire newQuery()
 * @method static \Illuminate\Database\Query\Builder|Commentaire onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereCommentaire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereEtablissementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Commentaire withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Commentaire withoutTrashed()
 * @mixin \Eloquent
 */
	class Commentaire extends \Eloquent {}
}

namespace App\Models{
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
 * @method static \Illuminate\Database\Eloquent\Builder|Etablissement whereCommodites($value)
 * @mixin \Eloquent
 */
	class Etablissement extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Horaire
 *
 * @property int $id
 * @property int $etablissement_id
 * @property string $jour
 * @property string $plage_horaire
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Etablissement|null $etablissement
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire newQuery()
 * @method static \Illuminate\Database\Query\Builder|Horaire onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire query()
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire whereEtablissementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire whereJour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire wherePlageHoraire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horaire whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Horaire withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Horaire withoutTrashed()
 * @mixin \Eloquent
 */
	class Horaire extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Image
 *
 * @property int $id
 * @property int $etablissement_id
 * @property string $image_url
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Etablissement|null $etablissement
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Query\Builder|Image onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereEtablissementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Image withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Image withoutTrashed()
 * @mixin \Eloquent
 */
	class Image extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Paiement
 *
 * @property int $id
 * @property int $abonnement_id
 * @property int $user_id
 * @property string $date_paiement
 * @property string|null $reference_id
 * @property string|null $reference_position
 * @property string $type_paiement
 * @property string $statut
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Abonnement|null $abonnement
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement newQuery()
 * @method static \Illuminate\Database\Query\Builder|Paiement onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereAbonnementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereDatePaiement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereReferencePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereStatut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereTypePaiement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paiement whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Paiement withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Paiement withoutTrashed()
 * @mixin \Eloquent
 */
	class Paiement extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting withoutTrashed()
 */
	class Setting extends \Eloquent {}
}

namespace App\Models\Social{
/**
 * App\Models\Social\SocialFacebookAccount
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider_user_id
 * @property string $provider
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount newQuery()
 * @method static \Illuminate\Database\Query\Builder|SocialFacebookAccount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount whereProviderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialFacebookAccount whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|SocialFacebookAccount withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SocialFacebookAccount withoutTrashed()
 * @property-read User|null $user
 * @mixin \Eloquent
 */
	class SocialFacebookAccount extends \Eloquent {}
}

namespace App\Models\Social{
/**
 * App\Models\Social\SocialGoogleAccount
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider_user_id
 * @property string $provider
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount newQuery()
 * @method static \Illuminate\Database\Query\Builder|SocialGoogleAccount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount whereProviderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialGoogleAccount whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|SocialGoogleAccount withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SocialGoogleAccount withoutTrashed()
 * @property-read User|null $user
 * @mixin \Eloquent
 */
	class SocialGoogleAccount extends \Eloquent {}
}

namespace App\Models\Social{
/**
 * App\Models\Social\SocialTwitterAccount
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider_user_id
 * @property string $provider
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount newQuery()
 * @method static \Illuminate\Database\Query\Builder|SocialTwitterAccount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount whereProviderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialTwitterAccount whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|SocialTwitterAccount withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SocialTwitterAccount withoutTrashed()
 * @property-read User|null $user
 * @mixin \Eloquent
 */
	class SocialTwitterAccount extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SousCategorie
 *
 * @property int $id
 * @property string $nom
 * @property int $categorie_id
 * @property string|null $logourl
 * @property string|null $logourlmap
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Categorie|null $categorie
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Etablissement[] $etablissements
 * @property-read int|null $etablissements_count
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie newQuery()
 * @method static \Illuminate\Database\Query\Builder|SousCategorie onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie query()
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereCategorieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereLogourl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereLogourlmap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|SousCategorie withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SousCategorie withoutTrashed()
 * @property string|null $color
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategorie whereColor($value)
 * @mixin \Eloquent
 */
	class SousCategorie extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SousCategoriesEtablissement
 *
 * @property int $id
 * @property int $etablissement_id
 * @property int $sous_categorie_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement query()
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement whereEtablissementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement whereSousCategorieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SousCategoriesEtablissement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class SousCategoriesEtablissement extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tracking
 *
 * @property int $id
 * @property int $user_id
 * @property string $longitude
 * @property string $latitude
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking newQuery()
 * @method static \Illuminate\Database\Query\Builder|Tracking onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Tracking withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Tracking withoutTrashed()
 * @property string|null $speed
 * @property string|null $timestamp
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tracking whereTimestamp($value)
 * @mixin \Eloquent
 */
	class Tracking extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $phone
 * @property string|null $fcm_token
 * @property string|null $image_profil
 * @property string|null $token
 * @property string|null $token_secret
 * @property int $abonnement_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Abonnement|null $abonnement
 * @property-read \App\Models\Admin|null $admin
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Batiment[] $batiments
 * @property-read int|null $batiments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commentaire[] $commentaires
 * @property-read int|null $commentaires_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Etablissement[] $etablissements
 * @property-read int|null $etablissements_count
 * @property-read SocialFacebookAccount|null $facebook
 * @property-read SocialGoogleAccount|null $google
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tracking[] $trackings
 * @property-read int|null $trackings_count
 * @property-read SocialTwitterAccount|null $twitter
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAbonnementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFcmToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImageProfil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTokenSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 * @mixin \Eloquent
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail, \Filament\Models\Contracts\FilamentUser {}
}

namespace App\Models{
/**
 * App\Models\UserFavoris
 *
 * @property int $id
 * @property int $user_id
 * @property int $etablissement_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserFavoris onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris whereEtablissementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFavoris whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|UserFavoris withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserFavoris withoutTrashed()
 * @mixin \Eloquent
 */
	class UserFavoris extends \Eloquent {}
}

