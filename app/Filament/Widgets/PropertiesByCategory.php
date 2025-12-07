<?php

namespace App\Filament\Widgets;

use App\Models\Property;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PropertiesByCategory extends ChartWidget
{
    protected ?string $heading = 'Properties by Category';
    protected static ?int $sort = 2;
    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $propertiesByCategory = Property::where('status', true)
            ->get()
            ->pluck('categories')
            ->flatten()
            ->countBy()
            ->sortDesc()
            ->take(8);

        return [
            'datasets' => [
                [
                    'label' => 'Properties',
                    'data' => $propertiesByCategory->values()->toArray(),
                    'backgroundColor' => [
                        'rgb(59, 130, 246)',
                        'rgb(16, 185, 129)',
                        'rgb(251, 146, 60)',
                        'rgb(139, 92, 246)',
                        'rgb(236, 72, 153)',
                        'rgb(245, 158, 11)',
                        'rgb(20, 184, 166)',
                        'rgb(248, 113, 113)',
                    ],
                ],
            ],
            'labels' => $propertiesByCategory->keys()->map(fn($key) => ucwords(str_replace('_', ' ', $key)))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
