<?php

namespace IFRS\Filament\Services;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use IFRS\Models\Category;
use IFRS\Models\Currency;
use IFRS\Models\Entity;

class FieldsService
{

    public static function entity()
    {
        return Select::make('entity_id')
            ->label('Юр. лицо')
            ->options(Entity::get()->pluck('name', 'id'))
            ->required()
            ->searchable();
    }

    public static function category()
    {
        return Select::make('category_id')
            ->label('Категория')
            ->options(Category::get()->pluck('name', 'id'))
            ->searchable();
    }

    public static function currency()
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

    public static function accountType()
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
