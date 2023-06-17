<?php
  
namespace App\Enums;
 
enum TransactionStatus: int {
    case AUTHORIZED = 1;
    case DECLINED = 2;
    case REFUNDED = 3;

    public function label(): string
    {
        return match ($this) {
            self::AUTHORIZED => 'Authorized',
            self::DECLINED => 'Declined',
            self::REFUNDED => 'Refunded',
            default => 'Unknown',
        };
    }

    public static function value(string $label): int
    {
        return match ($label) {
            'Authorized' => self::AUTHORIZED,
            'Declined' => self::DECLINED,
            'Refunded' => self::REFUNDED,
            default => 0,
        };
    }
}