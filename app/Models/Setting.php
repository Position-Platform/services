<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "app_name", "app_api_url", "app_api_key", "app_version", "app_description", "app_logo", "android_app_version", "ios_app_version", "ios_app_link", "android_app_link", "privacy_policy_link", "terms_of_service_link", "contact_email", "contact_phone", "contact_address", "facebook_link", "twitter_link", "linkedin_link", "maintenance_mode", "map_api_key", "default_map_style", "is_facebook_login_enabled", "is_google_login_enabled"
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
