<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	public function comments() {
		return $this->hasMany(Comment::class, 'order_id');
	}

	public function services() {
		return $this->belongsTo(Service::class, 'service_id');
	}

	public function user() {
		return $this->belongsTo(User::class, 'user_order');
	}

	public function getUserAddService() {
		return $this->belongsTo(User::class, 'user_id');
	}

}
