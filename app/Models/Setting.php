<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property int $id
 * @property string $app_name
 * @property string $app_api_url
 * @property string $app_api_key
 * @property string $app_version
 * @property string $app_description
 * @property string $app_logo
 * @property string $android_app_version
 * @property string $ios_app_version
 * @property string $ios_app_link
 * @property string $android_app_link
 * @property string $privacy_policy_link
 * @property string $terms_of_service_link
 * @property string $contact_email
 * @property string $contact_phone
 * @property string $contact_address
 * @property string $facebook_link
 * @property string $twitter_link
 * @property string $linkedin_link
 * @property bool $maintenance_mode
 * @property string $map_api_key
 * @property string $default_map_style
 * @property bool $is_facebook_login_enabled
 * @property bool $is_google_login_enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAndroidAppLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAndroidAppVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAppApiKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAppApiUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAppDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAppLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAppName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAppVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereContactAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereContactPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDefaultMapStyle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFacebookLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIosAppLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIosAppVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIsFacebookLoginEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIsGoogleLoginEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLinkedinLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereMaintenanceMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereMapApiKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePrivacyPolicyLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTermsOfServiceLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTwitterLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting withoutTrashed()
 * @property bool $is_osm_login_enabled
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIsOsmLoginEnabled($value)
 * @property bool $is_apple_login_enabled
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIsAppleLoginEnabled($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "app_name", "app_api_url", "app_api_key", "app_version", "app_description", "app_logo", "android_app_version", "ios_app_version", "ios_app_link", "android_app_link", "privacy_policy_link", "terms_of_service_link", "contact_email", "contact_phone", "contact_address", "facebook_link", "twitter_link", "linkedin_link", "maintenance_mode", "map_api_key", "default_map_style", "is_facebook_login_enabled", "is_google_login_enabled", "is_osm_login_enabled", "is_apple_login_enabled"
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
