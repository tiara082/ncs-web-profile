<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Gallery Item')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Textarea::make('description')
                            ->maxLength(65535)
                            ->columnSpanFull()
                            ->rows(3),
                        
                        Select::make('gallery_type')
                            ->options([
                                'image' => 'Image',
                                'video' => 'Video',
                                'document' => 'Document',
                            ])
                            ->required()
                            ->native(false),
                        
                        Select::make('uploaded_by')
                            ->relationship('admin', 'username')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->default(auth()->id()),
                        
                        FileUpload::make('file_path')
                            ->required()
                            ->image()
                            ->imageEditor()
                            ->directory('gallery')
                            ->disk('public')
                            ->visibility('public')
                            ->maxSize(2048) // 2MB max
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
