<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model {
	public function services() {
		return $this->belongsTo(Service::class, 'service_id');
	}

	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}
}
