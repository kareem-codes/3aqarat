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
            Stat::make('إجمالي العقارات', $totalProperties)
                ->description($activeProperties . ' عقار نشط')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 12, 15, 18, 22, 25, $totalProperties]),
            
            Stat::make('العقارات المميزة', $featuredProperties)
                ->description('القوائم المميزة')
                ->descriptionIcon('heroicon-m-star')
                ->color('warning'),
            
            Stat::make('إجمالي المشاريع', $totalProjects)
                ->description($activeProjects . ' مشروع نشط')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('info')
                ->chart([3, 5, 7, 9, 11, $totalProjects]),
            
            Stat::make('الوكلاء النشطون', $activeAgents)
                ->description('من أصل ' . $totalAgents . ' وكيل')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),
            
            Stat::make('إجمالي العملاء المحتملين', $totalLeads)
                ->description($newLeadsThisMonth . ' عميل جديد هذا الشهر')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([10, 15, 22, 28, 35, 42, $totalLeads]),
            
            Stat::make('متوسط سعر العقار', '$' . number_format($averagePrice, 2))
                ->description('إجمالي قيمة المحفظة: $' . number_format($totalValue, 0))
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('success'),
        ];
    }
}
