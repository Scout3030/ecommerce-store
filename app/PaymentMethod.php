<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model {
	const ACTIVE = 1;
	const INACTIVE = 2;
}
