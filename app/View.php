<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model {
	public function services() {
		return $this->belongsTo(Service::class, 'service_id');
	}
}
