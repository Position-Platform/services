<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BatimentResource\Pages;
use App\Filament\Resources\BatimentResource\RelationManagers;
use App\Models\Batiment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BatimentResource extends Resource
{
    protected static ?string $model = Batiment::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationGroup = 'Gestion des Etablissements';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')->default(auth()->user()->id),
                Forms\Components\TextInput::make('nom')
                    ->maxLength(125),
                Forms\Components\TextInput::make('nombre_niveau')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(125),
                Forms\Components\TextInput::make('longitude')
                    ->required()
                    ->maxLength(125),
                Forms\Components\TextInput::make('latitude')
                    ->required()
                    ->maxLength(125),
                Forms\Components\FileUpload::make('image')
                    ->directory('uploads/batiments/images')->image()
                            ->loadingIndicatorPosition('left')
                            ->enableDownload(),
                            
                Forms\Components\Textarea::make('indication')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('rue')
                    ->maxLength(125),
                Forms\Components\TextInput::make('ville')
                    ->required()
                    ->maxLength(125),
                Forms\Components\TextInput::make('commune')
                    ->required()
                    ->maxLength(125),
                Forms\Components\TextInput::make('quartier')
                    ->required()
                    ->maxLength(125),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombre_niveau')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->searchable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rue')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ville')
                    ->searchable(),
                Tables\Columns\TextColumn::make('commune')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quartier')
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
            'index' => Pages\ListBatiments::route('/'),
            'create' => Pages\CreateBatiment::route('/create'),
            'view' => Pages\ViewBatiment::route('/{record}'),
            'edit' => Pages\EditBatiment::route('/{record}/edit'),
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

public static function authorization()
{
    return auth()->user()->id == 2 ? true: null;
}
}
