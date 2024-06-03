<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OsmDataResource\Pages;
use App\Filament\Resources\OsmDataResource\RelationManagers;
use App\Models\OsmData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OsmDataResource extends Resource
{
    protected static ?string $model = OsmData::class;

    protected static ?string $navigationIcon = 'heroicon-s-home';

    protected static ?string $navigationGroup = 'Gestion des Etablissements';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('sous_categorie_id')
                    ->required()
                    ->maxLength(125),
                Forms\Components\TextInput::make('osm_id')
                    ->required()
                    ->maxLength(125),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(125),
                Forms\Components\TextInput::make('lon')
                    ->required()
                    ->maxLength(125),
                Forms\Components\TextInput::make('lat')
                    ->required()
                    ->maxLength(125),
                Forms\Components\TextInput::make('opening_hours')
                    ->maxLength(125),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(125),
                Forms\Components\TextInput::make('website')
                    ->maxLength(125),
                Forms\Components\TextInput::make('code_postal')
                    ->maxLength(125),
                Forms\Components\TextInput::make('city')
                    ->maxLength(125),
                Forms\Components\TextInput::make('quartier')
                    ->maxLength(125),
                Forms\Components\TextInput::make('rue')
                    ->maxLength(125),
                Forms\Components\FileUpload::make('image')
                    ->image(),
                Forms\Components\TextInput::make('description')
                    ->maxLength(125),
                Forms\Components\TextInput::make('services')
                    ->maxLength(125),
                Forms\Components\TextInput::make('commodites')
                    ->maxLength(125),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sous_categorie_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('osm_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('opening_hours')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('code_postal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quartier')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rue')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('services')
                    ->searchable(),
                Tables\Columns\TextColumn::make('commodites')
                    ->searchable(),
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
            'index' => Pages\ListOsmData::route('/'),
            'create' => Pages\CreateOsmData::route('/create'),
            'view' => Pages\ViewOsmData::route('/{record}'),
            'edit' => Pages\EditOsmData::route('/{record}/edit'),
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
