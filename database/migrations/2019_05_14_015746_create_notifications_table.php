<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('notifications', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('user_notify_you')->unsigned();
			$table->foreign('user_notify_you')->references('id')->on('users')->onDelete('cascade');
			$table->bigInteger('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->tinyInteger('seen');
			$table->tinyInteger('type');
			$table->bigInteger('notify_id')->unsigned();
			$table->string('url');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('notifications');
	}
}
