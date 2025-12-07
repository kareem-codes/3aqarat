<?php

namespace App\Filament\Widgets;

use App\Models\Property;
use App\Models\Project;
use App\Models\Agent;
use App\Models\Lead;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalProperties = Property::count();
        $activeProperties = Property::where('status', true)->count();
        $featuredProperties = Property::where('is_featured', true)->count();
        
        $totalProjects = Project::count();
        $activeProjects = Project::where('status', true)->count();
        
        $totalAgents = Agent::count();
        $activeAgents = Agent::where('status', true)->count();
        
        $totalLeads = Lead::count();
        $newLeadsThisMonth = Lead::whereMonth('created_at', now()->month)->count();
        
        $averagePrice = Property::where('status', true)->avg('price');
        $totalValue = Property::where('status', true)->sum('price');

        return [
            Stat::make('Total Properties', $totalProperties)
                ->description($activeProperties . ' active properties')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 12, 15, 18, 22, 25, $totalProperties]),
            
            Stat::make('Featured Properties', $featuredProperties)
                ->description('Premium listings')
                ->descriptionIcon('heroicon-m-star')
                ->color('warning'),
            
            Stat::make('Total Projects', $totalProjects)
                ->description($activeProjects . ' active projects')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('info')
                ->chart([3, 5, 7, 9, 11, $totalProjects]),
            
            Stat::make('Active Agents', $activeAgents)
                ->description('Out of ' . $totalAgents . ' total agents')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),
            
            Stat::make('Total Leads', $totalLeads)
                ->description($newLeadsThisMonth . ' new this month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([10, 15, 22, 28, 35, 42, $totalLeads]),
            
            Stat::make('Average Property Price', '$' . number_format($averagePrice, 2))
                ->description('Total portfolio value: $' . number_format($totalValue, 0))
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('success'),
        ];
    }
}
