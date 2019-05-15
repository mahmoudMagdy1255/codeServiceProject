<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}

	public function category() {
		return $this->belongsTo(Category::class, 'category_id');
	}

	public function orders() {
		return $this->hasMany(Order::class, 'service_id');
	}

	public function votes() {
		return $this->hasMany(Vote::class, 'service_id');
	}

}
