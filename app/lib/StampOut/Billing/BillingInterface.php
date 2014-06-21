<?php namespace StampOut\Billing;

interface BillingInterface {
	
	public function charge(array $data);

}