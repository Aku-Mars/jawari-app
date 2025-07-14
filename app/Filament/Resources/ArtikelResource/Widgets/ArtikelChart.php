<?php

namespace App\Filament\Resources\ArtikelResource\Widgets;

use App\Models\Artikel;
use Filament\Widgets\ChartWidget;

class ArtikelChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $data = collect(range(1, 12))
            ->mapWithKeys(fn($month) => [
                $month => 0,
            ]);

        Artikel::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get()
            ->each(function ($row) use (&$data) {
                $data[$row->month] = $row->count;
            });

        return [
            'datasets' => [
                [
                    'label' => 'Artikel Dibuat',
                    'data' => $data->values(),
                    'backgroundColor' => '#B33D24',
                ],
            ],
            'labels' => [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Agu',
                'Sep',
                'Okt',
                'Nov',
                'Des'
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
