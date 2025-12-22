<?php

namespace App\Filament\Widgets;

use App\Models\Property;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class PropertyPriceDistribution extends ChartWidget
{
    protected ?string $heading = 'توزيع أسعار العقارات';
    protected static ?int $sort = 3;
    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $properties = Property::where('status', true)
            ->whereNotNull('price')
            ->orderBy('price')
            ->get();

        $priceRanges = [
            '0-100K' => 0,
            '100K-250K' => 0,
            '250K-500K' => 0,
            '500K-1M' => 0,
            '1M-2M' => 0,
            '2M+' => 0,
        ];

        foreach ($properties as $property) {
            $price = $property->price;
            
            if ($price < 100000) {
                $priceRanges['0-100K']++;
            } elseif ($price < 250000) {
                $priceRanges['100K-250K']++;
            } elseif ($price < 500000) {
                $priceRanges['250K-500K']++;
            } elseif ($price < 1000000) {
                $priceRanges['500K-1M']++;
            } elseif ($price < 2000000) {
                $priceRanges['1M-2M']++;
            } else {
                $priceRanges['2M+']++;
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'عدد العقارات',
                    'data' => array_values($priceRanges),
                    'backgroundColor' => 'rgb(34, 197, 94)',
                    'borderColor' => 'rgb(22, 163, 74)',
                ],
            ],
            'labels' => array_keys($priceRanges),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
