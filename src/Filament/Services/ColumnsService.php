<?php

namespace IFRS\Filament\Services;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use IFRS\Models\Category;
use IFRS\Models\Currency;
use IFRS\Models\Entity;
use Illuminate\Database\Eloquent\Model;

class ColumnsService
{

    public static function entity()
    {
        return TextColumn::make('entity.name')
            ->label('Юр. лицо')
            ->searchable()->description(fn (Model $record): string|null => $record->description, position: 'above')
            ->sortable();
    }
    public static function select($field, $label)
    {
        return TextColumn::make($field)
            ->label($label)
            ->searchable()
            ->sortable();
    }


    public static function currencies()
    {
        return Select::make('currency_id')
            ->label('Валюта')
            ->options(Currency::get()->pluck('name', 'id'))
            ->required()
            ->preload()
            ->native(false)
//            ->searchable()
            ;
    }

    public static function accountTypes()
    {
        return Select::make('account_type')
            ->label('Тип счёта')
            ->options(config('ifrs.accounts'))
            ->required()
            ->searchable();
    }

    public static function name()
    {
        return TextInput::make('name')
            ->label('Название')
            ->required()
            ->maxLength(255);
    }

    public static function description()
    {
        return TextInput::make('description')
            ->label('Описание')
//            ->required()
            ->maxLength(1000);
    }
}
