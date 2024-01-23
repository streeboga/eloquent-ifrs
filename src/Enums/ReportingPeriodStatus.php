<?php

namespace IFRS\Enums;


use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasLabel;

enum ReportingPeriodStatus: string implements HasLabel, HasDescription, HasColor
{
    case OPEN = 'OPEN';
    case CLOSED = 'CLOSED';
    case ADJUSTING = 'ADJUSTING';

    public function getLabel(): ?string
    {
//        return $this->name;

        // or

        return match ($this) {
            self::OPEN => __('ifrs.open'),
            self::CLOSED => __('ifrs.close'),
            self::ADJUSTING => __('ifrs.adjusting'),
        };
    }
//    public function getLabel(): ?string
//    {
//        return $this->name;
//    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::OPEN => 'gray',
            self::CLOSED => 'warning',
            self::ADJUSTING => 'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::OPEN => 'heroicon-m-pencil',
            self::ADJUSTING => 'heroicon-m-check',
            self::CLOSED => 'heroicon-m-x-mark',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::OPEN => 'This has not finished being written yet.',
            self::CLOSED => 'This is ready for a staff member to read.',
            self::ADJUSTING => 'This has been approved by a staff member and is public on the website.',
        };
    }
}
