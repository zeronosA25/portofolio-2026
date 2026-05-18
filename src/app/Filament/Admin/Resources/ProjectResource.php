<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Projects';

    protected static ?string $modelLabel = 'Project';

    protected static ?string $pluralModelLabel = 'Projects';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Project')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                        if ($operation === 'create') {
                            $set('slug', Str::slug($state));
                        }
                    }),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->rows(5)
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('image')
                    ->label('Gambar Project')
                    ->image()
                    ->imagePreviewHeight('200')
                    ->directory('projects')
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('erd_image')
                    ->label('ERD Image')
                    ->image()
                    ->imagePreviewHeight('200')
                    ->directory('projects/erd')
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('flowchart_image')
                    ->label('Flowchart Image')
                    ->image()
                    ->imagePreviewHeight('200')
                    ->directory('projects/flowcharts')
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('demo_url')
                    ->label('Demo URL')
                    ->url()
                    ->maxLength(255),

                Forms\Components\TextInput::make('github_url')
                    ->label('Github URL')
                    ->url()
                    ->maxLength(255),

                Forms\Components\TagsInput::make('technologies')
                    ->label('Teknologi')
                    ->placeholder('Laravel, Filament, Livewire')
                    ->columnSpanFull(),

                Forms\Components\Toggle::make('is_published')
                    ->label('Tampilkan di Website')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('technologies')
                    ->label('Teknologi')
                    ->badge()
                    ->separator(','),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
