<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->default('Position');
            $table->string('app_api_url')->default('https://api.position.cm');
            $table->string('app_api_key')->default('GngCfqQT9ydj8BtQIPqWWDJsIittDKOWucVRDSdHLBBXbOxdbTJizDUc0hrjYw6E');
            $table->string('app_version')->default('1.0.0');
            $table->string('app_description')->default('Position est une application web qui vous permet de trouver les meilleurs endroits autour de vous.');
            $table->string('app_logo')->default('images/logo-nom.jpg');
            $table->string('android_app_version')->default('1.0.0');
            $table->string('ios_app_version')->default('1.0.0');
            $table->string('ios_app_link')->default('https://apps.apple.com/app/id1234567890');
            $table->string('android_app_link')->default('https://play.google.com/store/apps/details?id=com.example.app');
            $table->string('privacy_policy_link')->default('https://example.com/privacy-policy');
            $table->string('terms_of_service_link')->default('https://example.com/terms-of-service');
            $table->string('contact_email')->default('infos@position.cm');
            $table->string('contact_phone')->default('+237 6 00 00 00 00');
            $table->string('contact_address')->default('Douala, Cameroun');
            $table->string('facebook_link')->default('https://facebook.com/position');
            $table->string('twitter_link')->default('https://twitter.com/position');
            $table->string('linkedin_link')->default('https://linkedin.com/position');
            $table->boolean('maintenance_mode')->default(false);
            $table->string('map_api_key')->default('GZun6glaQh7PwnoBZoOm');
            $table->string('default_map_style')->default('https://api.maptiler.com/maps/streets-v2/style.json');
            $table->boolean('is_facebook_login_enabled')->default(true);
            $table->boolean('is_google_login_enabled')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
