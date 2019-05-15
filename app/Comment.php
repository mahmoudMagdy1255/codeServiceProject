<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
	public function order() {
		return $this->belongsTo(Order::class, 'order_id');
	}
}
