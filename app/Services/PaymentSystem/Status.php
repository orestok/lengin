<?php

namespace App\Services\PaymentSystem;

class Status {

    const SUCCESS = 1;
    const FAILURE = 2;
    const NOT_ENOUGH = 3;

    public static function cases(): array {

        return [
            self::SUCCESS => 'Payment processed successfully',
            self::FAILURE => 'You bank declined an answer',
            self::NOT_ENOUGH => 'Sorry, not enough money',
        ];

    }

}
