<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Textarea::make('problem')
                    ->columnSpanFull(),
                Textarea::make('solution')
                    ->columnSpanFull(),
                Textarea::make('tech_stack')
                    ->columnSpanFull(),
                Textarea::make('features')
                    ->columnSpanFull(),
                Toggle::make('is_featured')
                    ->required(),
                TextInput::make('status')
                    ->required()
                    ->default('draft'),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('github_url')
                    ->url(),
                TextInput::make('live_url')
                    ->url(),
            ]);
    }
}
