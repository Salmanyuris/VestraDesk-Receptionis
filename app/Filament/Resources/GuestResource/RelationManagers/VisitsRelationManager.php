<?php

namespace App\Filament\Resources\GuestResource\RelationManagers;

use App\Models\Visit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisitsRelationManager extends RelationManager
{
    protected static string $relationship = 'visits';

    protected static ?string $title = 'Riwayat Kunjungan';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('employee_id')
                    ->label('Karyawan')
                    ->relationship('employee', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\DateTimePicker::make('check_in')
                    ->label('Check-in')
                    ->required(),
                Forms\Components\DateTimePicker::make('check_out')
                    ->label('Check-out'),
                Forms\Components\Textarea::make('purpose')
                    ->label('Keperluan')
                    ->required()
                    ->rows(3),
                Forms\Components\Textarea::make('notes')
                    ->label('Catatan')
                    ->rows(2),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'checked_in' => 'Sedang Berkunjung',
                        'checked_out' => 'Selesai',
                    ])
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('check_in')
            ->columns([
                Tables\Columns\TextColumn::make('employee.name')
                    ->label('Karyawan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('check_in')
                    ->label('Check-in')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('check_out')
                    ->label('Check-out')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('purpose')
                    ->label('Keperluan')
                    ->limit(50),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'checked_in',
                        'danger' => 'checked_out',
                    ])
                    ->formatStateUsing(fn ($state) => $state === 'checked_in' ? 'Sedang Berkunjung' : 'Selesai'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'checked_in' => 'Sedang Berkunjung',
                        'checked_out' => 'Selesai',
                    ]),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Kunjungan'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('check_out')
                    ->label('Check-out')
                    ->icon('heroicon-o-arrow-right-on-rectangle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update([
                            'check_out' => now(),
                            'status' => 'checked_out',
                        ]);
                    })
                    ->hidden(fn ($record) => $record->status === 'checked_out'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}