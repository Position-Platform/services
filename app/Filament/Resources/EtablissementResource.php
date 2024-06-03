<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EtablissementResource\Pages;
use App\Filament\Resources\EtablissementResource\RelationManagers;
use App\Models\Etablissement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class EtablissementResource extends Resource
{
    protected static ?string $model = Etablissement::class;

    protected static ?string $navigationIcon = 'heroicon-s-home';

    protected static ?string $navigationGroup = 'Gestion des Etablissements';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom')
                    ->required()
                    ->maxLength(125),
                Forms\Components\Select::make('batiment_id')
                    ->relationship(name: 'batiment', titleAttribute: 'nom')
                    ->searchable(['nom', 'id'])
                    ->preload()
                    ->label('Batiment')
                    ->required(),
                Forms\Components\Hidden::make('user_id')->default(auth()->user()->id),
                Forms\Components\Textarea::make('indication_adresse')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('code_postal')
                    ->maxLength(125),
                Forms\Components\TextInput::make('site_internet')
                    ->maxLength(125),
                Forms\Components\TextInput::make('nom_manager')
                    ->maxLength(125),
                Forms\Components\TextInput::make('contact_manager')
                    ->maxLength(125),
                Forms\Components\TextInput::make('etage')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\FileUpload::make('cover')
                    ->directory('uploads/batiments/images')->image()
                    ->loadingIndicatorPosition('left')
                    ->downloadable(),

                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(125),
                Forms\Components\TextInput::make('whatsapp1')
                    ->required()
                    ->maxLength(125),
                Forms\Components\TextInput::make('whatsapp2')
                    ->maxLength(125),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('osm_id')
                    ->maxLength(125),
                Forms\Components\Textarea::make('services')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('commodites')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('ameliorations')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('logo')->directory('uploads/etablissements/logos')->image()
                    ->loadingIndicatorPosition('left')
                    ->downloadable(),
                Forms\Components\FileUpload::make('logo_map')->directory('uploads/etablissements/logos')->image()
                    ->loadingIndicatorPosition('left')
                    ->downloadable(),
                Forms\Components\Repeater::make('sous_categorie_id')
                    ->relationship('sousCategories')
                    ->required()
                    ->schema([
                        Forms\Components\Select::make('sous_categorie_id')
                            ->options(\App\Models\SousCategorie::all()->pluck('nom', 'id')->toArray())
                            ->searchable(['nom', 'id'])
                            ->preload()
                            ->label('Liste des Sous Catégories')
                            ->required(),
                    ])
                    ->columns(1),

                Forms\Components\Repeater::make('images')
                    ->relationship()
                    ->schema([
                        Forms\Components\FileUpload::make('image_url')
                            ->disk('public')
                            ->directory('uploads/batiments/images')
                            ->image()
                            ->loadingIndicatorPosition('left')
                            ->downloadable(),
                    ])
                    ->columns(1),

                Forms\Components\Repeater::make('horaires')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('jour')
                            ->required()
                            ->options([
                                'lundi' => 'Lundi',
                                'mardi' => 'Mardi',
                                'mercredi' => 'Mercredi',
                                'jeudi' => 'Jeudi',
                                'vendredi' => 'Vendredi',
                                'samedi' => 'Samedi',
                                'dimanche' => 'Dimanche',
                            ]),
                        Forms\Components\TextInput::make('plage_horaire')->required()->placeholder('Exemple: 08h00-12h00;14h00-18h00'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('batiment.nom')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.nom')
                    ->sortable(),
                Tables\Columns\TextColumn::make('code_postal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('site_internet')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nom_manager')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_manager')
                    ->searchable(),
                Tables\Columns\TextColumn::make('etage')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('osm_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vues')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->bulkActions([
                ExportBulkAction::make()
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
            'index' => Pages\ListEtablissements::route('/'),
            'create' => Pages\CreateEtablissement::route('/create'),
            'view' => Pages\ViewEtablissement::route('/{record}'),
            'edit' => Pages\EditEtablissement::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
