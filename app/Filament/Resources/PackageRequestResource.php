<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageRequestResource\Pages;
use App\Filament\Resources\PackageRequestResource\RelationManagers;
use App\Models\PackageRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class PackageRequestResource extends Resource
{
    protected static ?string $model = PackageRequest::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationIcon = 'heroicon-o-inbox';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->email(),
                TextInput::make('phone'),
                Select::make('package_id')
                    ->relationship('package', 'title')
                    ->disabled(),
                Textarea::make('notes')->columnSpanFull()->disabled(),
                Select::make('status')
                ->label('حالة الطلب')
                ->options([
                    'معلق' => 'معلق',
                    'مؤكد' => 'مؤكد',
                    'مرفوض' => 'مرفوض',
                ])
                ->required()
                ->default('معلق'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('phone'),
                TextColumn::make('email'),
                TextColumn::make('package.title')->label('Package'),
                TextColumn::make('created_at')->dateTime('d M Y H:i'),
                TextColumn::make('status')
                ->label('الحالة')
                ->badge()
                ->color(fn ($state) => match ($state) {
                    'معلق' => 'warning',
                    'مؤكد' => 'success',
                    'مرفوض' => 'danger',
                }),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPackageRequests::route('/'),
            'edit' => Pages\EditPackageRequest::route('/{record}/edit'),
        ];
    }
}
