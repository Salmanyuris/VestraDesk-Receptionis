<?php

namespace App\Filament\Widgets;

use App\Models\Visit;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentVisits extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Visit::query()
                    ->with(['guest', 'employee'])
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('guest.photo')
                    ->label('Foto')
                    ->circular(),
                Tables\Columns\TextColumn::make('guest.name')
                    ->label('Nama Tamu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('employee.name')
                    ->label('Karyawan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('purpose')
                    ->label('Keperluan')
                    ->limit(50),
                Tables\Columns\TextColumn::make('check_in')
                    ->label('Check-in')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'checked_in',
                        'danger' => 'checked_out',
                    ])
                    ->formatStateUsing(fn ($state) => $state === 'checked_in' ? 'Sedang Berkunjung' : 'Selesai'),
            ])
            ->actions([
                Tables\Actions\Action::make('check_out')
                    ->label('Check-out')
                    ->icon('heroicon-o-arrow-right-on-rectangle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (Visit $record) {
                        $record->update([
                            'check_out' => now(),
                            'status' => 'checked_out',
                        ]);
                    })
                    ->hidden(fn (Visit $record) => $record->status === 'checked_out'),
            ]);
    }
}