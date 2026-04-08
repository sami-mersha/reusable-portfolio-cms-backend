<?php

namespace App\Filament\Resources\Certificates\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('issuer'),
                DatePicker::make('issue_date'),
                TextInput::make('credential_url')
                    ->url(),
                FileUpload::make('image')
                    ->image(),
            ]);
    }
}
