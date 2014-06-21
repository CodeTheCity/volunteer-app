<?php 

namespace StampOut\Billing;

use Stripe;
use Stripe_Charge;
use Config;


class StripeBilling implements BillingInterface {

	public function __construct()
	{
		Stripe::setApiKey(Config::get('stripe.test_secret_key'));
	}

	public function charge(array $data)
	{
		try {
				return Stripe_Charge::create([
				'amount' => 1000, // £10
				'currency' => 'gbp',
				'description' => $data['email'],
				'card' => $data['token']
			]);

		} catch(Stripe_CardError $e)
		{
			// card was declined 
			dd('card was declined')
		}
			
	}
}