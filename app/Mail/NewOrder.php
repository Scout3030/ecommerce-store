<?php

namespace App\Mail;

use App\Sell;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrder extends Mailable {
	use Queueable, SerializesModels;

	public $sell;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(Sell $sell) {
		$sell->load(
			'soldProducts.product',
			'paymentMethod'
		);
		$this->sell = $sell;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this
			->subject(__("Nueva orden registrada en el sistema"))
			->markdown('mails.new-order')
			->with('sell', $this->sell);
	}
}
