<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SousCategorieResource\Pages;
use App\Filament\Resources\SousCategorieResource\RelationManagers;
use App\Models\SousCategorie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\TemporaryUploadedFile;

class SousCategorieResource extends Resource
{
    protected static ?string $model = SousCategorie::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Gestion des Catégories';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom')
                    ->required()
                    ->maxLength(125),
                Forms\Components\Select::make('categorie_id')
                ->relationship(name: 'categorie', titleAttribute: 'nom')
                ->searchable(['nom', 'id'])
                ->preload()
                ->label('Catégorie')
                    ->required(),
                Forms\Components\FileUpload::make('logourl')->directory('uploads/categories/logos')->image()
                            ->loadingIndicatorPosition('left')
                            ->enableDownload(),
                            
                   
                Forms\Components\FileUpload::make('logourlmap')->directory('uploads/categories/logos')
                   ->image()
                            ->loadingIndicatorPosition('left')
                            ->enableDownload()
                            ,
                Forms\Components\ColorPicker::make('color'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('categorie.nom')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ColorColumn::make('color')
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
            'index' => Pages\ListSousCategories::route('/'),
            'create' => Pages\CreateSousCategorie::route('/create'),
            'view' => Pages\ViewSousCategorie::route('/{record}'),
            'edit' => Pages\EditSousCategorie::route('/{record}/edit'),
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
