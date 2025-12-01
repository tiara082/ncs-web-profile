<?php

namespace App\Filament\Resources\Contents\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Content Information')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Select::make('content_type')
                            ->options([
                                'article' => 'Article',
                                'news' => 'News',
                                'announcement' => 'Announcement',
                                'research' => 'Research',
                                'project' => 'Project',
                            ])
                            ->required()
                            ->native(false),
                        
                        Select::make('created_by')
                            ->relationship('creator', 'name')
                            ->label('Created By')
                            ->default(auth()->id())
                            ->required()
                            ->searchable()
                            ->preload()
                            ->native(false),
                        
                        RichEditor::make('body')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'link',
                                'heading',
                                'bulletList',
                                'orderedList',
                                'blockquote',
                                'codeBlock',
                                'undo',
                                'redo',
                            ]),
                    ])
                    ->columns(2),
                
                Section::make('Categories')
                    ->schema([
                        Select::make('categories')
                            ->relationship('categories', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->native(false),
                    ]),
            ]);
    }
}
