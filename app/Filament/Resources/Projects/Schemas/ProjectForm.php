<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Title')
                    ->required(),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required(),

                Textarea::make('description')
                    ->label('Description')
                    ->columnSpanFull(),

                Textarea::make('problem')
                    ->label('Problem')
                    ->columnSpanFull(),

                Textarea::make('solution')
                    ->label('Solution')
                    ->columnSpanFull(),

                Textarea::make('tech_stack')
                    ->label('Tech Stack')
                    ->columnSpanFull()
                    ->dehydrateStateUsing(function ($state) {
                        if (is_array($state)) {
                            return array_values(array_filter(array_map('trim', $state)));
                        }
                        if (is_string($state)) {
                            return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $state))));
                        }
                        return [];
                    }),

                Textarea::make('features')
                    ->label('Features')
                    ->columnSpanFull()
                    ->dehydrateStateUsing(function ($state) {
                        if (is_array($state)) {
                            return array_values(array_filter(array_map('trim', $state)));
                        }
                        if (is_string($state)) {
                            return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $state))));
                        }
                        return [];
                    }),

                Toggle::make('is_featured')
                    ->label('Featured')
                    ->required(),

                Select::make('status')
                    ->label('Status')
                    ->required()
                    ->options([
                        'draft' => 'Draft',
                        'active' => 'Active',
                        'on_hold' => 'On Hold',
                        'completed' => 'Completed',
                        'signed' => 'Signed',
                        'idle' => 'Idle',
                        'published' => 'Published',
                        'terminated' => 'Terminated',
                        'expired' => 'Expired',
                        'failed' => 'Failed',
                    ])
                    ->default('draft'),

                FileUpload::make('image')
                    ->label('Project Image')
                    ->image(),

                TextInput::make('github_url')
                    ->label('GitHub URL')
                    ->url(),

                TextInput::make('live_url')
                    ->label('Live URL')
                    ->url(),
            ]);
    }
}