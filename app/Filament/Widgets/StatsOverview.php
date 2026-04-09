<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Certificate;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Projects', Project::count())
                ->description('Total projects')
                ->icon('heroicon-o-rectangle-stack')
                ->color('success'),

            Stat::make('Featured', Project::where('is_featured', true)->count())
                ->description('Highlighted projects')
                ->icon('heroicon-o-star')
                ->color('warning'),

            Stat::make('Skills', Skill::count())
                ->description('Total skills')
                ->icon('heroicon-o-light-bulb')
                ->color('primary'),

            Stat::make('Experiences', Experience::count())
                ->description('Work history')
                ->icon('heroicon-o-briefcase')
                ->color('info'),

            Stat::make('Certificates', Certificate::count())
                ->description('Achievements')
                ->icon('heroicon-o-academic-cap')
                ->color('gray'),
        ];
    }
}