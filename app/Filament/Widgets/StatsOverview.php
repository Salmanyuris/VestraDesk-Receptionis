<?php

namespace App\Filament\Widgets;

use App\Models\Guest;
use App\Models\Visit;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $today = now()->format('Y-m-d');
        
        return [
            Stat::make('Total Tamu', Guest::count())
                ->description('Jumlah tamu terdaftar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make('Kunjungan Hari Ini', Visit::whereDate('check_in', $today)->count())
                ->description('Kunjungan hari ini')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('info')
                ->chart([17, 16, 14, 15, 14, 13, 12]),

            Stat::make('Sedang Berkunjung', Visit::where('status', 'checked_in')->count())
                ->description('Tamu sedang di lokasi')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('warning')
                ->chart([15, 4, 10, 2, 12, 4, 12]),

            Stat::make('Total Karyawan', Employee::where('status', true)->count())
                ->description('Karyawan aktif')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('primary')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
        ];
    }
}