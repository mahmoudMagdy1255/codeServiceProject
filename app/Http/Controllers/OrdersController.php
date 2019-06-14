<?php

namespace App\Http\Controllers;

use App\Order;
use App\Service;
use Auth;
use Illuminate\Http\Request;

class OrdersController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function mySendOrders() {

		$user = Auth::user();

		$orders = $user->orders()->with('services', 'getUserAddService')->orderBy('id', 'DESC')->get();

		return [
			'orders' => $orders,
			'user' => $user,
		];

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		request()->validate([

			'service_id' => 'required|exists:services,id',

		]);

		$service = Service::findOrFail(request('service_id'));

		if (Auth::id() != $service->user_id) {

			$orderedItBefore = Order::where('user_order', Auth::id())->where('service_id', $service->id)->exists();

			if (!$orderedItBefore) {

				$order = new Order;

				$order->service_id = $service->id;
				$order->user_id = $service->user_id;
				$order->user_order = Auth::id();
				$order->service_id = $service->id;
				$order->status = 0;
				$order->type = 0;

				if ($order->save()) {
					return 'true';
				}

			}

		}

		abort(403);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
