<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SiteProfileResource\Pages;
use App\Filament\Admin\Resources\SiteProfileResource\RelationManagers;
use App\Models\SiteProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiteProfileResource extends Resource
{
    protected static ?string $model = SiteProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('site_name')
                    ->required()
                    ->maxLength(255)
                    ->default('Personal Shape'),
                Forms\Components\TextInput::make('hero_subtitle')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('hero_title')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('hero_description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('hero_button_text')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('about_title')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\FileUpload::make('about_image')
                    ->image(),
                Forms\Components\TextInput::make('about_heading')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('about_description_1')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('about_description_2')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('about_description_3')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('skills')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('site_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hero_subtitle')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hero_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hero_button_text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('about_title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('about_image'),
                Tables\Columns\TextColumn::make('about_heading')
                    ->searchable(),
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
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSiteProfiles::route('/'),
            'create' => Pages\CreateSiteProfile::route('/create'),
            'edit' => Pages\EditSiteProfile::route('/{record}/edit'),
        ];
    }
}
