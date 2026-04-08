<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('tagline'),
                Textarea::make('bio')
                    ->columnSpanFull(),
                TextInput::make('location'),
                TextInput::make('github_url')
                    ->url(),
                TextInput::make('linkedin_url')
                    ->url(),
                FileUpload::make('image')
                    ->image(),
            ]);
    }
}
