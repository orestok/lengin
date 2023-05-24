<?php

namespace App\Services\PaymentSystem;

class Payment {

    public static function pay($cvv): array {

        //Only for demo purposes

        [$code, $message] = self::generateStatus($cvv);

        return [
            'result' => $code == Status::SUCCESS,
            'message' => $message,
        ];

    }

    protected static function generateStatus($cvv): array {

        $rand = $cvv[0];

        if($value = (Status::cases()[$rand]) ?? false) {
            return [$rand, $value];
        }

        $rand = rand(Status::SUCCESS, Status::NOT_ENOUGH);

        return [$rand, Status::cases()[$rand]];

    }

}
