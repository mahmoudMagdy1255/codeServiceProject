<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function services() {
		return $this->hasMany(Service::class, 'user_id');
	}

	public function orders() {
		return $this->hasMany(Order::class, 'user_order');
	}

	public function getMyServiceOrders() {
		return $this->hasMany(Order::class, 'user_id');
	}

	public function getMessageIAdd() {
		return $this->hasMany(Order::class, 'user_message_you');
	}

	public function messages() {
		return $this->hasMany(Order::class, 'user_id');
	}

	public function getNotificationsISend() {
		return $this->hasMany(Order::class, 'user_notify_you');
	}

	public function notifications() {
		return $this->hasMany(Order::class, 'user_id');
	}

	public function votes() {
		return $this->hasMany(Vote::class, 'user_id');
	}

}
