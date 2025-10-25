<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitResource\Pages;
use App\Models\Visit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class VisitResource extends Resource
{
    protected static ?string $model = Visit::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'Manajemen Kunjungan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Kunjungan')
                    ->schema([
                        Forms\Components\Select::make('guest_id')
                            ->label('Tamu')
                            ->relationship('guest', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nama Lengkap')
                                    ->required(),
                                Forms\Components\TextInput::make('company')
                                    ->label('Perusahaan'),
                                Forms\Components\TextInput::make('phone')
                                    ->label('Telepon')
                                    ->required(),
                                Forms\Components\TextInput::make('email')
                                    ->label('Email'),
                            ]),
                        Forms\Components\Select::make('employee_id')
                            ->label('Karyawan yang Dikunjungi')
                            ->relationship('employee', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\DateTimePicker::make('check_in')
                            ->label('Waktu Check-in')
                            ->default(now())
                            ->required(),
                        Forms\Components\DateTimePicker::make('check_out')
                            ->label('Waktu Check-out'),
                        Forms\Components\Textarea::make('purpose')
                            ->label('Keperluan')
                            ->required()
                            ->rows(3),
                        Forms\Components\Textarea::make('notes')
                            ->label('Catatan')
                            ->rows(2),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('guest.name')
                    ->label('Nama Tamu')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('employee.name')
                    ->label('Karyawan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('employee.department')
                    ->label('Departemen')
                    ->sortable(),
                Tables\Columns\TextColumn::make('check_in')
                    ->label('Check-in')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('check_out')
                    ->label('Check-out')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration')
                    ->label('Durasi')
                    ->getStateUsing(fn ($record) => $record->duration),
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
                Tables\Filters\Filter::make('check_in')
                    ->form([
                        Forms\Components\DatePicker::make('check_in_from')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('check_in_until')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['check_in_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('check_in', '>=', $date),
                            )
                            ->when(
                                $data['check_in_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('check_in', '<=', $date),
                            );
                    }),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisits::route('/'),
            'create' => Pages\CreateVisit::route('/create'),
            'edit' => Pages\EditVisit::route('/{record}/edit'),
        ];
    }
}