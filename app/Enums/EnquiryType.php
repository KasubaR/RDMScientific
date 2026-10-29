<?php

namespace App\Enums;

enum EnquiryType: string
{
    case Product = 'product';
    case Quotation = 'quotation';
    case Technical = 'technical';
    case Supplier = 'supplier';
    case General = 'general';

    public function label(): string
    {
        return match ($this) {
            self::Product => 'Product enquiry',
            self::Quotation => 'Quotation',
            self::Technical => 'Technical assistance',
            self::Supplier => 'Supplier enquiry',
            self::General => 'General enquiry',
        };
    }
}
