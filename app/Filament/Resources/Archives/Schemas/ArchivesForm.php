<?php

namespace App\Filament\Resources\Archives\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class ArchivesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Section::make('Publication Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->rows(3),
                        Forms\Components\TextInput::make('keywords')
                            ->label('Keywords')
                            ->helperText('Separate keywords with commas')
                            ->placeholder('e.g., machine learning, artificial intelligence, neural networks'),
                        Forms\Components\TextInput::make('doi')
                            ->label('DOI')
                            ->placeholder('e.g., 10.1000/182'),
                        Forms\Components\TextInput::make('issn_journal')
                            ->label('ISSN Journal')
                            ->placeholder('e.g., 1234-5678'),
                    ])
                    ->columns(1),
                Forms\Components\Section::make('Publication Details')
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->options([
                                'research' => 'Research',
                                'publication' => 'Publication',
                                'document' => 'Document',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('publication')
                            ->label('Publication Venue')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('year')
                            ->numeric()
                            ->minLength(4)
                            ->maxLength(4)
                            ->default(date('Y')),
                        Forms\Components\Select::make('author_id')
                            ->relationship('author', 'name')
                            ->searchable()
                            ->preload()
                            ->label('Author'),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Files')
                    ->schema([
                        Forms\Components\FileUpload::make('file_path')
                            ->label('Publication File')
                            ->directory('archives')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip', 'application/x-rar-compressed'])
                            ->maxSize(51200)
                            ->required(),
                        Forms\Components\FileUpload::make('cover_image')
                            ->label('Cover Image')
                            ->directory('archives/covers')
                            ->image()
                            ->imageEditor()
                            ->maxSize(10240),
                    ])
                    ->columns(2),
            ]);
    }
}
