<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('imageable_id')->nullable();
			$table->string('imageable_type', 128)->nullable();
            $table->string('untouched', 128)->nullable();
            $table->string('medium', 128)->nullable();
            $table->string('thumb', 128)->nullable();
            $table->string('mime', 16)->nullable();
			$table->timestamps();

            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photos');
	}

}
