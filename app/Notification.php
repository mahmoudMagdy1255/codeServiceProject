<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {
	public function sender() {
		return $this->belongsTo(User::class, 'user_notify_you');
	}

	public function reciever() {
		return $this->belongsTo(User::class, 'user_id');
	}
}
