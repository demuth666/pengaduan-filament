<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Pengaduan;

class PengaduanChart extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Belum Ditinjau', Pengaduan::where('status', 'Belum Ditinjau')->count()),
            Stat::make('Sedang Ditinjau', Pengaduan::where('status', 'Sedang Ditinjau')->count()),
            Stat::make('Selesai', Pengaduan::where('status', 'Selesai')->count())
        ];
    }
}
