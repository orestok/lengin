<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentPayRequest;
use App\Models\Order;
use App\Models\Service;
use App\Services\PaymentSystem\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller {

    public function index(Request $request) {

        if($request->session()->has('invoice')) {
            return Redirect::route('payment.process');
        }

        $service = Service::inRandomOrder()->first();
        $faker = \Faker\Factory::create();

        $data = [
            'amount' => rand(300, 5000),
            'firstname' => $faker->firstName,
            'lastname' => $faker->lastName,
            'middlename' => $faker->firstName,
            'service_id' => $service->id,
        ];

        $request->session()->put('invoice', $data);
        $data['service'] = $service;

        return view('payment.invoice', $data);

    }

    public function process(Request $request) {
        return view('payment.pay');
    }

    public function pay(PaymentPayRequest $request) {

        DB::beginTransaction();

        $order = new Order();
        $order->fill($request->session()->get('invoice'));
        $order->save();

        $response = Payment::pay($request->get('cvv'));

        if($response['result']) {
            DB::commit();
            $request->session()->remove('invoice');
        } else {
            DB::rollBack();

            return Redirect::back()
                ->withErrors([
                    'bank' => $response['message'],
                ]);

        }

        return view('payment.success');

    }

}
