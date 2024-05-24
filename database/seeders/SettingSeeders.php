<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                "app_name" => "Position",
                "app_api_url" => "https://api.position.cm",
                "app_api_key" => "GngCfqQT9ydj8BtQIPqWWDJsIittDKOWucVRDSdHLBBXbOxdbTJizDUc0hrjYw6E",
                "app_logo" => "images/logo-nom.jpg",
                "app_description" => "Position est une application web qui vous permet de trouver les meilleurs endroits autour de vous.",
                "app_version" => "1.0.0",
                "android_app_version" => "1.0.0",
                "ios_app_version" => "1.0.0",
                "ios_app_link" => "https://apps.apple.com/app/id1234567890",
                "android_app_link" => "https://play.google.com/store/apps/details?id=com.example.app",
                "privacy_policy_link" => "https://example.com/privacy-policy",
                "terms_of_service_link" => "https://example.com/terms-of-service",
                "contact_email" => "infos@position.cm",
                "contact_phone" => "+237 6 00 00 00 00",
                "contact_address" => "Douala, Cameroun",
                "facebook_link" => "https://facebook.com/position",
                "twitter_link" => "https://twitter.com/position",
                "linkedin_link" => "https://linkedin.com/position",
                "maintenance_mode" => false,
                "map_api_key" => "GZun6glaQh7PwnoBZoOm",
                "default_map_style" => "https://api.maptiler.com/maps/streets-v2/style.json",
                "is_facebook_login_enabled" => true,
                "is_google_login_enabled" => true,
                "is_osm_login_enabled" => true,
                "is_apple_login_enabled" => true,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
