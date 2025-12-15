<?php

namespace App\Filament\Resources\Members\Schemas;

use Filament\Schemas\Schema;

class MembersForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Section::make('Basic Information')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('member_name')
                            ->required()
                            ->maxLength(255)
                            ->label('Full Name'),
                        \Filament\Forms\Components\TextInput::make('member_role')
                            ->required()
                            ->maxLength(255)
                            ->label('Role/Position'),
                        \Filament\Forms\Components\TextInput::make('member_email')
                            ->email()
                            ->nullable()
                            ->maxLength(255)
                            ->label('Email'),
                        \Filament\Forms\Components\TextInput::make('member_phone')
                            ->nullable()
                            ->maxLength(255)
                            ->label('Phone Number'),
                        \Filament\Forms\Components\Textarea::make('member_address')
                            ->nullable()
                            ->rows(3)
                            ->label('Address'),
                    ]),
                \Filament\Forms\Components\Section::make('Professional Details')
                    ->schema([
                        \Filament\Forms\Components\RichEditor::make('biography')
                            ->nullable()
                            ->label('Biography')
                            ->columnSpanFull(),
                    ]),
                \Filament\Forms\Components\Section::make('Education')
                    ->schema([
                        \Filament\Forms\Components\Repeater::make('education')
                            ->label('Education Background')
                            ->schema([
                                \Filament\Forms\Components\TextInput::make('degree')
                                    ->required()
                                    ->label('Degree'),
                                \Filament\Forms\Components\TextInput::make('institution')
                                    ->required()
                                    ->label('Institution'),
                                \Filament\Forms\Components\TextInput::make('year')
                                    ->required()
                                    ->label('Year'),
                            ])
                            ->columns(1)
                            ->collapsible()
                            ->addActionLabel('Add Education'),
                    ]),
                \Filament\Forms\Components\Section::make('Research Publications')
                    ->schema([
                        \Filament\Forms\Components\Repeater::make('research')
                            ->label('Research Papers')
                            ->schema([
                                \Filament\Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->label('Title'),
                                \Filament\Forms\Components\TextInput::make('publication')
                                    ->required()
                                    ->label('Publication'),
                                \Filament\Forms\Components\TextInput::make('year')
                                    ->required()
                                    ->label('Year'),
                            ])
                            ->columns(1)
                            ->collapsible()
                            ->addActionLabel('Add Research'),
                    ]),
                \Filament\Forms\Components\Section::make('Projects')
                    ->schema([
                        \Filament\Forms\Components\Repeater::make('projects')
                            ->label('Projects')
                            ->schema([
                                \Filament\Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->label('Project Name'),
                                \Filament\Forms\Components\Textarea::make('description')
                                    ->required()
                                    ->label('Description')
                                    ->rows(2),
                                \Filament\Forms\Components\TextInput::make('link')
                                    ->nullable()
                                    ->label('Link')
                                    ->prefix('https://'),
                            ])
                            ->columns(1)
                            ->collapsible()
                            ->addActionLabel('Add Project'),
                    ]),
            ]);
    }
}
