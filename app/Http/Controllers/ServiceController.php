<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddServicesRequest;
use App\Service;
use Auth;
use Image;

class ServiceController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function myServices() {

		$services = Auth::user()->services()->orderBy('id', 'desc')->with('user')->withCount('user')->get();

		return response($services);

	}

	public function index() {

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
	public function store(AddServicesRequest $request) {

		if ($request->hasFile('image')) {

			$imageName = $this->uploadImages();

			$service = new Service;

			$service->desc = $request->desc;
			$service->image = $imageName;
			$service->name = $request->name;
			$service->price = $request->price;
			$service->category_id = $request->cat_id;
			$service->status = 0;

			$service->user()->associate(Auth::user());

			return $service->save() ? response()->json('done') : response()->json('error');

		}

	}

	protected function uploadImages() {

		$image = request()->image;

		$img = Image::make($image);

		$imageName = time() . '_' . Auth::getName() . '_' . $image->getClientOriginalName();

		// resize image
		$img->fit(800, 400);

		$images_path = public_path() . '/images/services/';

		$full_path = $images_path . $imageName;

		// save image
		$img->save($full_path, 80);

		return $imageName;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		$service = Service::where('id', $id)->with('user')->first();

		$myOtherService = Service::where('category_id', $service->category_id)->where('id', '!=', $service->id)->where('user_id', Auth::id())->with('user')->limit(6)->get();

		$OtherService = Service::where('category_id', $service->category_id)->where('id', '!=', $service->id)->where('user_id', '!=', Auth::id())->with('user')->limit(6)->get();

		$array = [
			'service' => $service,
			'myOtherService' => $myOtherService,
			'OtherService' => $OtherService,

		];

		return $array;

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
