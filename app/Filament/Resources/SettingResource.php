<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-m-wrench-screwdriver';

    protected static ?string $navigationGroup = 'Paramètres';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('app_name')
                    ->required()
                    ->maxLength(125)
                    ->default('Position'),
                Forms\Components\TextInput::make('app_api_url')
                    ->required()
                    ->maxLength(125)
                    ->default('https://api.position.cm'),
                Forms\Components\TextInput::make('app_api_key')
                    ->required()
                    ->maxLength(125)
                    ->default('GngCfqQT9ydj8BtQIPqWWDJsIittDKOWucVRDSdHLBBXbOxdbTJizDUc0hrjYw6E'),
                Forms\Components\TextInput::make('app_version')
                    ->required()
                    ->maxLength(125)
                    ->default('1.0.0'),
                Forms\Components\TextInput::make('app_description')
                    ->required()
                    ->maxLength(125)
                    ->default('Position est une application web qui vous permet de trouver les meilleurs endroits autour de vous.'),
                Forms\Components\TextInput::make('app_logo')
                    ->required()
                    ->maxLength(125)
                    ->default('images/logo-nom.jpg'),
                Forms\Components\TextInput::make('android_app_version')
                    ->required()
                    ->maxLength(125)
                    ->default('1.0.0'),
                Forms\Components\TextInput::make('ios_app_version')
                    ->required()
                    ->maxLength(125)
                    ->default('1.0.0'),
                Forms\Components\TextInput::make('ios_app_link')
                    ->required()
                    ->maxLength(125)
                    ->default('https://apps.apple.com/app/id1234567890'),
                Forms\Components\TextInput::make('android_app_link')
                    ->required()
                    ->maxLength(125)
                    ->default('https://play.google.com/store/apps/details?id=com.example.app'),
                Forms\Components\TextInput::make('privacy_policy_link')
                    ->required()
                    ->maxLength(125)
                    ->default('https://example.com/privacy-policy'),
                Forms\Components\TextInput::make('terms_of_service_link')
                    ->required()
                    ->maxLength(125)
                    ->default('https://example.com/terms-of-service'),
                Forms\Components\TextInput::make('contact_email')
                    ->email()
                    ->required()
                    ->maxLength(125)
                    ->default('infos@position.cm'),
                Forms\Components\TextInput::make('contact_phone')
                    ->tel()
                    ->required()
                    ->maxLength(125)
                    ->default('+237 6 00 00 00 00'),
                Forms\Components\TextInput::make('contact_address')
                    ->required()
                    ->maxLength(125)
                    ->default('Douala, Cameroun'),
                Forms\Components\TextInput::make('facebook_link')
                    ->required()
                    ->maxLength(125)
                    ->default('https://facebook.com/position'),
                Forms\Components\TextInput::make('twitter_link')
                    ->required()
                    ->maxLength(125)
                    ->default('https://twitter.com/position'),
                Forms\Components\TextInput::make('linkedin_link')
                    ->required()
                    ->maxLength(125)
                    ->default('https://linkedin.com/position'),
                Forms\Components\Toggle::make('maintenance_mode')
                    ->required(),
                Forms\Components\TextInput::make('map_api_key')
                    ->required()
                    ->maxLength(125)
                    ->default('GZun6glaQh7PwnoBZoOm'),
                Forms\Components\TextInput::make('default_map_style')
                    ->required()
                    ->maxLength(125)
                    ->default('https://api.maptiler.com/maps/streets-v2/style.json'),
                Forms\Components\Toggle::make('is_facebook_login_enabled')
                    ->required(),
                Forms\Components\Toggle::make('is_google_login_enabled')
                    ->required(),
                Forms\Components\Toggle::make('is_osm_login_enabled')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('app_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('app_api_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('app_api_key')
                    ->searchable(),
                Tables\Columns\TextColumn::make('app_version')
                    ->searchable(),
                Tables\Columns\TextColumn::make('app_description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('app_logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('android_app_version')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ios_app_version')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ios_app_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('android_app_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('privacy_policy_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('terms_of_service_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('twitter_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('linkedin_link')
                    ->searchable(),
                Tables\Columns\IconColumn::make('maintenance_mode')
                    ->boolean(),
                Tables\Columns\TextColumn::make('map_api_key')
                    ->searchable(),
                Tables\Columns\TextColumn::make('default_map_style')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_facebook_login_enabled')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_google_login_enabled')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_osm_login_enabled')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'view' => Pages\ViewSetting::route('/{record}'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
