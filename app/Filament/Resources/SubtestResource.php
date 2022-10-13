<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubtestResource\Pages;
use App\Filament\Resources\SubtestResource\RelationManagers;
use App\Models\Subtest;
use App\Models\Test;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubtestResource extends Resource
{
    protected static ?string $model = Subtest::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Runs query twice on crete/edit page when used with preload
                Forms\Components\Select::make('test_id')
                    ->relationship('test', 'id')
                    ->preload()
                    ->searchable(),

                // Runs query twice on crete/edit page when used with preload
                // Forms\Components\Select::make('test_id')
                //     ->relationship('test', 'id', function($query) {
                //         return $query;
                //     })
                //     ->preload()
                //     ->searchable(),

                // Works good on create/edit page
                // But runs query for each subtest item on list page
                // Forms\Components\Select::make('test_id')
                //     ->options(Test::all()->pluck('id', 'id'))
                //     ->searchable(),

                // Runs query twice on crete/edit page
                // Forms\Components\Select::make('test_id')
                //     ->options(function() {
                //         return Test::all()->pluck('id', 'id');
                //     })
                //     ->searchable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('test_id'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSubtests::route('/'),
            'create' => Pages\CreateSubtest::route('/create'),
            'edit' => Pages\EditSubtest::route('/{record}/edit'),
        ];
    }
}
