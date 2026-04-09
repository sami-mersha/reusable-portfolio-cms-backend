<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('organization')
                    ->label('Organization')
                    ->required(),

                TextInput::make('role')
                    ->label('Role')
                    ->required(),

                Textarea::make('description')
                    ->label('Description')
                    ->columnSpanFull(),

                DatePicker::make('start_date')
                    ->label('Start Date')
                    ->required(),

                DatePicker::make('end_date')
                    ->label('End Date'),

                Toggle::make('is_current')
                    ->label('Currently Working Here')
                    ->required(),

                Select::make('employment_type')
                    ->label('Employment Type')
                    ->required()
                    ->options([
                        'full_time' => 'Full Time',
                        'part_time' => 'Part Time',
                        'contract' => 'Contract',
                        'internship' => 'Internship',
                    ])
                    ->default('full_time'),

                TextInput::make('location')
                    ->label('Location'),

                Textarea::make('highlights')
                    ->label('Highlights')
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

                TextInput::make('order')
                    ->label('Order')
                    ->required()
                    ->numeric()
                    ->default(0),

                Toggle::make('is_visible')
                    ->label('Visible')
                    ->required(),
            ]);
    }
}