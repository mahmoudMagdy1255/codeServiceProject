<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {
	public function sender() {
		return $this->belongsTo(User::class, 'user_message_you');
	}

	public function reciever() {
		return $this->belongsTo(User::class, 'user_id');
	}
}
